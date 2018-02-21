<?php

require(ROOT . 'model/BirthdayModel.php');

function index(){
  render('main/index', loadAllBirthdays());
}

function create(){
  render("birthday/make");
}

function delete($id) {
  render("birthday/delete", $data = array($id));
}

function edit($id){
  render("birthday/edit", array("person" => select($id)));
}
