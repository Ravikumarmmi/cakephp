<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;
    use Cake\Validation\Validator;

    class Bookstable extends Table{
        public function validationDefault(Validator $validator){
            $validator 
            ->requirePresence("name","create","Name field should be needed")
                ->add("name",[
                    "length"=>[
                        "rule"=>["minLength",6],
                        "message"=>"Book name should be more than 5"
                        ]
                ])
            ->requirePresence("email","create","Email field should be needed")
                ->add("email",[
                    "valid_email"=>[
                        "rule"=>["email"],
                        "message"=>"Invalid Email Address"
                        ]
                ])
                ->add("email",[
                    "unique_email"=>[
                        "rule"=>["validateUnique"],
                        "provider"=>"table",
                        "message"=>"Email Address All ready Exist"
                        ]
                ])
            ->requirePresence("file","create","Image field should be needed")
            ->add("file",[
                "extension"=>[
                    "rule" =>["extension"],
                           array('gif', 'jpeg', 'png', 'jpg'),
                           "message" => "Please aupply a valid image."
                ]
            ])
            ->requirePresence("author","create","Author field should be needed");
            
            return $validator;
        }
    }