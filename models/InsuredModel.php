<?php
/**
 * Class to handle logic of inserting and viewing the insured
 */
class InsuredModel
{
    /**
     * Creates an insuree in database
     * @param string $name Name of the insured
     * @param string $surname Surname of the insured
     * @param int $age Age of the insured
     * @param string $phoneNumber Phone number of the insured
     * @return string Returns a message whether the insuree was added to the database
     */
    public function createInsured (string $name, string $surname, $age, string $phoneNumber)
    {
        if ($this->checkForm()) {
            return Db::queryOne("INSERT INTO insured (name, surname, age, phone_number) VALUES (?, ?, ?, ?)", 
                    array($name, $surname, $age, $phoneNumber));
    }
    }

    /**
     * Returns all contents of table insured
     * @return array All of the insurees stored in database
     */
    public function getAllInsured () : array
    {
        return Db::queryAll("SELECT * FROM insured ORDER BY insured_id");
    }
    
    
    private function checkForm () : bool
    {
        $isValid = true;
        
        if (empty($_POST['name'])) {
            MessageHandler::addNegativeMessage("Je třeba vyplnit jméno.");
            $isValid = false;
        } 
        
        if (empty($_POST['surname'])){
            MessageHandler::addNegativeMessage("Je třeba vyplnit příjmení.");
            $isValid = false;
        } 
        
        if (empty($_POST['age']) && (!is_int($_POST['age']))) {
            MessageHandler::addNegativeMessage("Je třeba správně vyplnit věk.");
            $isValid = false;
        } 
        
        if (empty($_POST['phone_number']) || (!preg_match("/^[0-9+]+$/", $_POST['phone_number']))) {
            MessageHandler::addNegativeMessage("Je třeba správně vyplnit telefonní číslo.");
            $isValid = false;
        }
        
        return $isValid;
    }
}