<?php
namespace App\Lib;

class FakeAPI {

  public function getUsers() {
    return $this->loadGET("https://jsonplaceholder.typicode.com/users");
  }
  public function getUser($id) {
    return $this->loadGET("https://jsonplaceholder.typicode.com/users/$id");
  }
  public function getComments() {
    return $this->loadGET("https://jsonplaceholder.typicode.com/comments");
  }
  public function getComment($id) {
    return $this->loadGET("https://jsonplaceholder.typicode.com/comments/$id");
  }
  public function getPosts() {
    return $this->loadGET("https://jsonplaceholder.typicode.com/posts");
  }
  public function getPost($id) {
    return $this->loadGET("https://jsonplaceholder.typicode.com/posts/$id");
  }
  protected function loadGET($url) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $result = json_decode(curl_exec($curl));
    $info = curl_getinfo($curl);
    if($info['http_code'] == 200) {
      return $result;
    } else {
      return false;
    }
  }

}
