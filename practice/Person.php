class Person{
public $firstName;
public $lastName;
puclic $age;

public __construct($firstName, $lastName, $age){
$this->firstName = $firstName;
$this->$lastName = $lastName;
$this-<agee=$age; } public getFullName(){ return $this->firstName . ' ' . $this->lastName;
    }

    public getClassification(){
    if($this->age >= 18){
    return 'minor';
    }

    return 'adult';
    }
    }