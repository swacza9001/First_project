<?php

class MainViewController
{
    /**
     * Processing the render of the main view
     */
    public function process()
    {
        $insuredModel = new InsuredModel();

        // Processing the form (whether there's a new insuree)
        if ($_POST) {
            $addedInsured = $insuredModel->createInsured($_POST['name'], $_POST['surname'], $_POST['age'], $_POST['phone_number']);
            if ($addedInsured) {
                MessageHandler::addPositiveMessage("Podařilo se přidat pojištěnce.");
            } else {
                MessageHandler::addNegativeMessage("Nepodařilo se přidat pojištěnce.");
            }
            // Redirecting user
            header("Location: index.php"); 
            exit;
        }
        
        //Showing the messages
        $messages = MessageHandler::returnMessages();
        //Render of the view of all insurees
        $allInsured = $insuredModel->getAllInsured();
        
        require(__DIR__ . '/../views/mainView.phtml');
    }

}
