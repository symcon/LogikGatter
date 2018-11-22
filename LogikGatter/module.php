<?
class LogikGatter extends IPSModule {
    
    public function Create(){
        //Never delete this line!
        parent::Create();

        //These lines are parsed on Symcon Startup or Instance creation
        //You cannot use variables here. Just static values.
        $this->RegisterPropertyInteger("Calculation", 0);
        $this->RegisterPropertyString("Input", "[]");
        $this->RegisterVariableBoolean("Output", $this->Translate("Output"));
    }

    public function Destroy(){
        //Never delete this line!
        parent::Destroy();
        
    }

    public function ApplyChanges(){
        //Never delete this line!
        parent::ApplyChanges();

        foreach (json_decode($this->ReadPropertyString("Input"), true) as $input) {
            $this->RegisterMessage($input["ID"], 10603);
        }

        $this->UpdateOutput();

        switch ($this->ReadPropertyInteger("Calculation")) {
            case 1: // OR
                $this->SetSummary("OR");
                break;

            case 2: // AND
                $this->SetSummary("AND");
                break;

            case 3: // NOR
                $this->SetSummary("NOR");
                break;

            case 4: // NAND
                $this->SetSummary("NAND");
                break;
        }

        if (method_exists($this, 'GetReferenceList')) {
            $refs = $this->GetReferenceList();
            foreach ($refs as $ref) {
                $this->UnregisterReference($ref);
            }

            foreach (json_decode($this->ReadPropertyString('Input'), true) as $input) {
                $this->RegisterReference($input['ID']);
            }
        }
    }

    public function MessageSink($timestamp, $senderID, $messageID, $data) {
        switch ($messageID) {
            case 10603: // VM_UPDATE
                $this->UpdateOutput();
                break;
        }
    }

    private function UpdateOutput() {

        $this->SendDebug('Update', 'Output', 0);
        $or = false;
        $and = true;

        foreach(json_decode($this->ReadPropertyString("Input"), true) as $input) {
            if (IPS_GetObject(intval($input["ID"]))["ObjectType"] == 2) {
                $value = (boolval(GetValue($input["ID"])) xor $input["Invert"]);
                $or = $or || $value;
                $and = $and && $value;
            }
        }

        if (@$this->GetIDForIdent("Output") !== false) {
            switch ($this->ReadPropertyInteger("Calculation")) {

                case 1: // OR
                    SetValue($this->GetIDForIdent("Output"), $or);
                    break;

                case 2: // AND
                    SetValue($this->GetIDForIdent("Output"), $and);
                    break;

                case 3: // NOR
                    SetValue($this->GetIDForIdent("Output"), !$or);
                    break;

                case 4: // NAND
                    SetValue($this->GetIDForIdent("Output"), !$and);
                    break;
            }
        }
    }
}

?>