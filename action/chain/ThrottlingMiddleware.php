<?php

namespace chain;

include_once 'Middleware.php';
class ThrottlingMiddleware extends Middleware{

    private $requestPerMinute;

    private $request;

    private $currentTime;

    public function __construct($requestPerMinute)
    {
        $this->requestPerMinute = $requestPerMinute;
        $this->currentTime = time();
    }

    public function check($email, $password)
    {
        if (time() > $this->currentTime + 60) {
            $this->request = 0;
            $this->currentTime = time();
        }

        $this->request++;

        if ($this->request > $this->requestPerMinute) {
            echo "ThrottlingMiddleware: Request limit exceeded!\n";
            die();
        }

        return parent::check($email, $password);
    }
}