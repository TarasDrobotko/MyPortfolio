<?php

class Form {
    public  function input($array){
        return '<input ' . $this->createString($array) . '><br>';
    }
    
    public function submit($array){
        return '<input type="submit" ' . $this->createString($array) . '><br>';
    }
    
    public function password($array){
        return '<input type ="password" ' . $this->createString($array) . '><br>';
    }
    
    public function textarea($array){
        return '<textarea ' . $this->createString($array) . '></textarea><br>';
    }
    
    public function open($array){
        return '<form ' . $this->createString($array) . '><br>';
    }
    
    public function close(){
        return '</form>';
    }
    
    private function createString($array){
        $string = '';
        foreach ($array as $key => $value)  {
            $string .= $key . ' = "' . $value . '" ';
        }
        return $string;
        
    }
    
}



 $form = new Form;
        echo $form->open(['action'=>'', 'method'=>'POST']);
	//Код выше выведет <form action="" method="POST">
        
        echo $form->input(['type'=>'text', 'placeholder'=>"Ваше ім'я", 'name'=>'name']);
	//Код выше выведет <input type="text" value="!!!">

	echo $form->password(['value'=>'123', 'name'=>'pass']);
	//Код выше выведет <input type="password" value="123">

	echo $form->textarea(['placeholder'=>123, 'name'=>'textarea']);
	//Код выше выведет <textarea placeholder="123"></textarea>

         echo $form->submit(['value'=>'Відправити']);
	//Код выше выведет <input type="submit" value="Відправити">
	echo $form->close();
        
/*class SmartForm extends Form {
    
    public function input($array){
if(!empty($_REQUEST['name'])){
$array['value'] = $_REQUEST['name'];
return parent::input($array);
} else {
return parent::input($array);
}
} 

public function password($array){
if(!empty($_REQUEST['pass'])){
$array['value'] = $_REQUEST['pass'];
return parent::password($array);
} else {
return parent::password($array);
}
} 

public function textarea($array){
if(!empty($_REQUEST['textarea'])){
$array['value'] = $_REQUEST['textarea'];
return parent::textarea($array);
} else {
return parent::textarea($array);
}
} 
  /*public function input ($array) {
      if(isset($REQUEST['name'])) {
       $value = $REQUEST['name'];
       
       return parent::input($array). $value;
      }
  }  
  
   public function password ($array) {
      if(isset($REQUEST['pass'])) {
       $value = $REQUEST['pass'];
       
       return parent::password($array). $value;
      }
  }  
  
   public function textarea ($array) {
      if(isset($REQUEST['textarea'])) {
       $value = $REQUEST['textarea'];
       
       return parent::textarea($array). $value;
      }
  }  
    
}

        /*$form = new Form;
        $smartForm = new smartForm;
        echo $form->open(['action'=>'', 'method'=>'POST']);
	//Код выше выведет <form action="" method="POST">
        
        echo $smartForm->input(['type'=>'text', 'placeholder'=>"Ваше ім'я", 'name'=>'name']);
	//Код выше выведет <input type="text" value="!!!">

	echo $smartForm->password(['value'=>'123', 'name'=>'pass']);
	//Код выше выведет <input type="password" value="123">

	echo $smartForm->textarea(['placeholder'=>123, 'name'=>'textarea']);
	//Код выше выведет <textarea placeholder="123"></textarea>

         echo $form->submit(['value'=>'Відправити']);
	//Код выше выведет <input type="submit" value="Відправити">
	echo $form->close();*/
	//Код выше выведет </form
?>














<!--
<form action="" method="GET">
    <select name="age[]" size="7">
        <option disabled>Сколько вам лет?</option>
        <option value="менее 20 лет"> менее 20 лет</option>
        <option value="20-25"> 20-25 </option>
        <option value="26-30"> 26-30 </option>
        <option value="более 30"> более 30 </option>
        </select>
        <input type="submit" name="Отправить">
</form>

<?php/*
        foreach ($_GET['age'] as $key=>$value) echo "Вам ". $value . "<br>";*/
		
?>

