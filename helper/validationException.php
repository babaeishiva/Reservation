<?php
class ValidationException extends Exception {
    function getErrorMessage() {
        return " there is validation error: <br> " . $this->getMessage();
    }
}
