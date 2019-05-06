<?php

namespace App\Controller;
use App\Controller\AppController;
use cake\Routing\Router;

class BookController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadmodel("Books");
        $this->viewBuilder()->setLayout('booklayout');
    }

    public function index(){
        $books = $this->Books->find("all",[
            "order"=>["id"=>"desc"]
        ]);
        $this->set("books",$books);
        $this->set("title","book Store");
    }

    public function create(){
        $this->set("title","book create");
    }
    public function save(){
        $this->autoRender = false;
        $book = $this->Books->newEntity($this->request->data);
        $validation = $book->errors();
        if(!empty($validation)){
            $this->Flash->set($validation,[
                "element"=>"book_error"
            ]);
        }else{
            $form_data = $this->request->data;
            // print_r($this->request->data);
            // die;
            $uploaded_path = "img/uploads";
            $tmp_name = $this->request->data['file']['tmp_name'];
            //image is valid or not
            $validImage = getimagesize($tmp_name);
            if($validImage===FALSE){
                $this->Flash->set("Image file is not valid",[
                    "element"=>"book_error"
                ]);
            }else{
                $image_name = $this->request->data['file']['name'];
                if(move_uploaded_file($tmp_name,WWW_ROOT.$uploaded_path."/".$image_name)){
                    $book->name = $form_data['name'];
                    $book->author = $form_data['author'];
                    $book->email = $form_data['email'];
                    $book->description = $form_data['description'];
                    $book->img = $uploaded_path."/".$image_name;
                    $this->Books->save($book);
                    $this->Flash->set("Book has been added Successfuly",[
                        "element"=>"book_success"
                    ]);
                }else{
                    $this->Flash->set("Image has been not added Successfuly",[
                        "element"=>"book_error"
                    ]);
                }
            }               
        }
        $this->redirect(["action"=>"create"]);
    }

    public function edit($id){
        $book = $this->Books->get($id);
        $this->set("book",$book);
        $this->set("title","book edit");
    }

    public function update(){
        $this->autoRender = false;
        $formdata = $this->request->data;
        $book = $this->Books->get($formdata['bookID']);
        $book->name = $formdata['name'];
        $book->author = $formdata['author'];
        $book->email = $formdata['email'];
        $book->description = $formdata['description'];
        $this->Books->save($book);
        $this->Flash->set("Book has been Updated Successfuly",[
            "element"=>"book_success"
        ]);
        $this->redirect(["action"=>"edit/".$formdata['bookID']]);
    }


    public function delete($id){
        $this->autoRender = false;
        $book = $this->Books->get($id);
        $this->Books->delete($book);
        $this->Flash->set("Book has been Deleted Successfuly",[
            "element"=>"book_success"
        ]);
        $this->redirect(["action"=>"index"]);
    }
}
?>


