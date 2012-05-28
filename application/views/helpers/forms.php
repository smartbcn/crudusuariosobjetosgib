<?php
/*
 * 
 */

function htmlSelectFromDB($db,$name, $idRow, $nameRow, $result, $datos)
{
    $html="<select name=\"".$name."\">";
    while ($row = $db -> arrayAssoc($result)) 
    {
        if($datos[$name]==$row[$idRow])
            $select ='selected';
        else
            $select = '';
        $html.="<option value=\"".$row[$idRow]."\" ".$select.">";
            $html.=$row[$nameRow];        
        $html.="</option>\n";
    }
    $html.="</select>";
    return $html;
}

function htmlSelectMultipleFromDB($db, $name, $idRow, $nameRow, $result, $datos)
{
    $html="<select multiple name=\"".$name."[]\">";
    $dato=explode(',',$datos[$name]);
    while ($row = $db -> arrayAssoc($result)) 
    {
        if(in_array($row[$idRow],$dato))
            $select ='selected';
        else
            $select = '';
        
        $html.="<option value=\"".$row[$idRow]."\" ".$select.">";
            $html.=$row[$nameRow];        
        $html.="</option>\n";        
    }
    $html.="</select>";
    return $html;
}
function htmlRadioFromDB($db,$name, $idRow, $nameRow, $result, $datos)
{   
    $html='';
    while ($row = $db -> arrayAssoc($result)) 
    {
        if($datos[$name]==$row[$idRow])
            $html.=$row[$nameRow].": <input type=\"radio\" 
                   name=\"".$name."\" 
                   value=\"".$row[$idRow]."\" checked>\n";
        else
            $html.=$row[$nameRow].": <input type=\"radio\" 
                   name=\"".$name."\" 
                   value=\"".$row[$idRow]."\" >\n";
    }
    return $html;
}
function htmlCheckboxFromDB($db,$name, $idRow, $nameRow, $result, $datos)
{
    $html='';
    $dato=explode(',',$datos[$name]);
    while ($row = $db -> arrayAssoc($result)) 
    {
        if(in_array($row[$idRow],$dato))
            $html.=$row[$nameRow].": <input type=\"checkbox\" 
                   name=\"".$name."[]\" 
                   value=\"".$row[$idRow]."\" checked>\n";
        else
            $html.=$row[$nameRow].": <input type=\"checkbox\" 
                   name=\"".$name."[]\" 
                   value=\"".$row[$idRow]."\" >\n";
    }
    return $html;
}        


?>

