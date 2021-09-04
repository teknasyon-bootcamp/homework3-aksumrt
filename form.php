<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */

class Form {
    //$fields property was defined
    public array $fields;
    //$action and $method properties were defined
    private function __construct(
        
        private string $action,
        private string $method,
    ){
    }
    //Creates a form object with parameters
    public static function createForm(string $action,string $method) : Form {
        return new static($action,$method);
    }
    //Creates a Post form with createForm method
    public static function createPostForm(string $action) : Form {
        return self::createForm($action,"POST");
    }
    //Creates a Get form with createForm method
    public static function createGetForm(string $action):Form{
        return self::createForm($action,"GET");
    }
    //Add $label,$name and $val variables in fields[] array
    public function addField(string $label, string $name, ?int $val = null) : void {
        $this->fields[]= array(
            "label" => $label,
            "name" => $name,
            "val" => $val
        );
       
    }
    //Determines method for form object
    public function setMethod(string $method) : void {
        $this->method = $method;
    }
    //Render a HTML Form for object
    public function render() : void {
        echo "<form action=' $this->action' method=' $this->method '>";
        
        foreach($this->fields as $field)
        {
            echo "<label for='" . $field["name"] . "'>" . $field["label"] . "</label>";
            echo "<input type='text' name='" . $field["name"] . "' value='" . $field["val"] . "'/>";
        }
        echo " ";
        echo "<button type='submit'>Gönder</button>";
        echo "</form>";

    }



}