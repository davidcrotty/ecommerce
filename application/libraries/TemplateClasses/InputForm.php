<?php

class InputForm{
    
    
    //could accept concrete implementation of these forms?
    public static function getValid($javascriptid,$inputType,$fieldname)
    {
        return   '              <label>'.$fieldname.'</label>
                                <div class="input-group" id="'.$javascriptid.'">
                                    <input type="'.$inputType.'" class="form-control" name="'.$fieldname.'" placeholder="'.$fieldname.'">
                                    <span class="input-group-addon">&#160;</span>
                                </div>
                                <br>';        
    }
    
    public static function getInvalid()
    {
        
    }
    
}

?>