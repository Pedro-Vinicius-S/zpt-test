<?php
namespace CompanyClient;
    //Resposta 09
class CompanyClient extends Company {
    private $registration;

    public function __construct($id, $registration) {
        parent::__construct($id);
        $this->registration = $registration;
    }

    public function getRegistration() {
        return $this->registration;
    }

    public function greeting() {
        return "Company: {$this->getId()} Registration: {$this->registration}";
    }
}