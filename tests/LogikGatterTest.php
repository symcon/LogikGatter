<?php

declare(strict_types=1);
include_once __DIR__ . '/stubs/Validator.php';
class LogikGatterTest extends TestCaseSymconValidation
{
    public function testValidateLogikGatter(): void
    {
        $this->validateLibrary(__DIR__ . '/..');
    }
    public function testValidateLogikGateModule(): void
    {
        $this->validateModule(__DIR__ . '/../LogikGate');
    }
}
