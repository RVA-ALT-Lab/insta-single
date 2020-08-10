<?php 

$fb = new Facebook\Facebook([
  'app_id' => '{624018001872161}',
  'app_secret' => '{c13b073d1f55108d4751b8b0e7d9df05}',
  'default_graph_version' => 'v2.3',
  // . . .
  ]);

var_dump($fb);


//https://graph.facebook.com/oauth/access_token
  // ?client_id={624018001872161}
  // &client_secret={c13b073d1f55108d4751b8b0e7d9df05}
  // &grant_type=client_credentials