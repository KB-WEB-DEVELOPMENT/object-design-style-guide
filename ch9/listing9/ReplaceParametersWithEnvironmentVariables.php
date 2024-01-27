<?php

/*
listing 9.9: Example of FileLoader decoration.
This class implements the FileLoader interface and takes into account environment variables
*/

final class ReplaceParametersWithEnvironmentVariables implements FileLoader
{
	public function __construct(
		private FileLoader $fileLoader,
		private array $envVariables
	){}
	
	public function loadFile(string $filePath): array
	{
		// if $filePath is invalid, the exception is caught. 
		$parameters = $this->fileLoader->loadFile($filePath);

		foreach ($parameters as $key => $value) {

		    $parameters[$key] = $this->replaceWithEnvVariable($value);
		}
		
		/*
		  if no exceptions are caught, the array $parameters returns: 
		  (1) an array with one $key as key and one $value as value for the one $key/$value pair contained in $filepath or an empty array
		   and 
		  (2)  If $this->envVariables[$value] is set, the value of $this->envVariables[$value] for each $value in the foreach loop.
                       If $this->envVariables[$value] is not set, $value for each $value in the foreach loop.
                   See code implementation 		  
		*/
		return $parameters;
	}
	
	private function replaceWithEnvVariable(string $value): string
	{
	   return (isset($this->envVariables[$value])) ? $this->envVariables[$value] : $value;	
	}
}

/*

Code implementation:

$parameterLoader = new ParameterLoader(
		       new ReplaceParametersWithEnvironmentVariables(
			   new MultipleLoaders([
			      'json' => new JsonFileLoader(),
			      'xml'  => new XmlFileLoader()
			    ]),
			    [
			      'APP_ENV' => 'dev',
			    ]
			)
		   );
					
$params = $parameterLoader->loadFile(__DIR__ . '/parameters.json');	
// $params[0] - multiple pairs of key,value in the "parameters.json" array or an empty array 
// $params['APP_ENV'] = 'dev'; 				
					
*/
