<?php

//CREAR UNA CLASE
class miClase
{
	//Propiedades

	public $miPropiedad='Esto variable';
	
	//Metodos
	public function miMetodo()
	{
		echo "Hola Mundo";
		return NULL;
	}
}

$miObjeto= new miClase;

$miObjeto -> miMetodo();
echo "<br>";
echo $miObjeto -> miPropiedad;
echo "</br>";
$miObjeto -> miPropiedad = 'otra cosa';
echo $miObjeto -> miPropiedad;
echo "</br>";
$miObjeto2 = new miClase;
echo $miObjeto2 -> miPropiedad;

echo "<hr/>";

class A
{
	function foo()
	{
		if (isset($this)) { // $This referencia al objeto
			echo '$this is defined (';
			echo get_class($this);
			echo ")\n";
		} else {
			echo "\$this is not defined.\n";
		}
	}
}

$objeto1 = new A;
$objeto1->foo();

echo "<hr/>";

class SimpleClass
{
	// invalid member declarations:
	//public $var1 = 'hello '.'world'; en la definicion de la clase las propiedades no se pueden crear dinamicamente 
	public $var2 = <<<EOD
hello world
EOD;
// 	todos son incorrectos
// 	public $var3 = 1+2;
// 	public $var4 = self::myStaticMethod();
// 	public $var5 = $myVar;
	// valid member declarations:
	public $pi=3.141856;
	//public $var6 = myConstant;
	//public $var7 = self::pi; //::operador de resolucion. Self: referencia a la clase
	public $var8 = array(true, false);

// 	define('myConstant','miValor'); No se puede asignar el valor de una constante en el cuerpo de la clase

	function displayVar2()
	{
		echo "Simple class\n";		
	}
}

$objeto2 = new SimpleClass();

echo $objeto2  -> pi;
//echo $objeto2  -> var7;
echo "<hr/>";

class ExtendClass extends SimpleClass
{
	// Redefine the parent method
	function displayVar()
	{
		echo "Extending class\n";
		echo "<br/>";
		parent::displayVar2();
	}
}
$extended = new ExtendClass();
$extended->displayVar();
echo "<br/>";
$extended ->displayVar2();

echo "<hr/>";
class MyDestructableClass {
	function __construct() {
		print "In constructor\n";
		$this->name = "MyDestructableClass\n";
	}
	function __destruct() {
		print "Destroying " . $this->name . "\n";
	}
}
$obj = new MyDestructableClass();

echo "<hr/>";

class MyClass
{
	public $public = 'Public';
	protected $protected = 'Protected';
	private $private = 'Private';
	function printHello()
	{
		echo $this->public;
		echo $this->protected;
		echo $this->private;
	}
}

$obj2 = new MyClass();
echo $obj2 -> public;
echo $obj2 -> printHello();
echo "<hr/>";

class BaseClass {
	public function test() {
		echo "BaseClass::test() called\n";
	}
	final public function moreTesting() { // No permite que las clases heredadas sobreescriban el metodo
		echo "BaseClass::moreTesting() called\n";
	}
}
class ChildClass extends BaseClass {
	public function moreTesting() {
		echo "ChildClass::moreTesting() called\n";
	}
}
//Retorna: Fatal error: Cannot override final method BaseClass::moreTesting() in C:\www\crudusuariosobjetos\public\objetos.php on line 141
?>


