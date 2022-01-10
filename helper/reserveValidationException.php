<?php
class ReserveValidationException extends Exception
{
    public function getReserveValidationErrors()
    {
        return "this is a reserve validation error <br>" . $this->getMessage();
    }
}
