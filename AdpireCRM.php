<?php
class AdpireCRM{
    private $api_token;
    private $api_version = 'v1';
    private $api_url = 'http://adpirecrm.com/api';
    private $store = array();
    
    function __construct(){
        $this->setBillingSameAsShipping(true);
    }
    
    public function setAPIToken($apiToken){
        $this->set('apiToken', $apiToken);
    }
    
    public function getAPIToken(){
        return $this->get('apiToken');
    }
    
    public function setAPIVersion($version){
        $this->set('apiVersion', $version);
    }
    
    public function getAPIVersion(){
        return $this->get('apiVersion');
    }
    
    public function setAPIUrl($apiUrl){
        $this->set('apiUrl', $apiUrl);
    }
    
    public function getAPIUrl(){
        return $this->get('apiUrl');
    }
    
    public function setFirstName($firstName){
        $this->set('firstName', $firstName);
    }
    
    public function getFirstName(){
        return $this->get('firstName');
    }
    
    public function setLastName($lastName){
        $this->set('lastName', $lastName);
    }
    
    public function getLastName(){
        return $this->get('lastName');
    }
    
    public function setAddress($address){
        $this->set('address', $address);
    }
    
    public function getAddress(){
        return $this->get('address');
    }
    
    public function setAddress2($address2){
        $this->set('address2', $address2);
    }
    
    public function getAddress2(){
        return $this->get('address2');
    }
    
    public function setCity($city){
        $this->set('city', $city);
    }
    
    public function getCity(){
        return $this->get('city');
    }
    
    public function setState($state){
        $this->set('state', $state);
    }
    
    public function getState(){
        return $this->get('state');
    }
    
    public function setZip($zip){
        $this->set('zip', $zip);
    }
    
    public function getZip(){
        return $this->get('zip');
    }
    
    public function setCCNo($ccno){
        $this->set('ccno', $ccno);
    }
    
    public function getCCNo(){
        return $this->get('ccno');
    }
    
    public function setCCExp($ccexp){
        $this->set('ccexp', $ccexp);
    }
    
    public function getCCExp(){
        return $this->get('ccexp');
    }

    public function setCVV($cvv){
        $this->set('cvv', $cvv);
    }
    
    public function getCVV(){
        return $this->get('cvv');
    }

    public function setBillingSameAsShipping($billingSameAsShipping){
        $this->set('billingSameAsShipping', $billingSameAsShipping);
    }
    
    public function getBillingSameAsShipping(){
        return $this->get('billingSameAsShipping');
    }

    public function setBillingFirstName($firstName){
        $this->set('billingFirstName', $firstName);
    }
    
    public function getBillingFirstName(){
        return $this->get('billingFirstName');
    }
    
    public function setBillingLastName($lastName){
        $this->set('billingLastName', $lastName);
    }
    
    public function getBillingLastName(){
        return $this->get('billingLastName');
    }

    public function setBillingAddress($billingAddress){
        $this->set('billingAddress', $billingAddress);
    }
    
    public function setBillingCity($city){
        $this->set('billingCity', $city);
    }

    public function getBillingCity(){
        return $this->get('billingCity');
    }
    
    public function setBillingState($state){
        $this->set('billingState', $state);
    }

    public function getBillingState(){
        return $this->get('billingState');
    }
    
    public function setBillingZip($zip){
        $this->set('billingZip', $zip);
    }
    
    public function getBillingZip(){
        return $this->get('billingZip');
    }
    
    private function set($key, $val){
        $this->store[$key] = $val;
    }
    
    private function get($key){
        return $this->store[$key];
    }
    
    public function getAll(){
        return $this->store;
    }
    
    private function post($api_data){
        $api_url = $this->getAPIUrl();
        
        foreach($api_data as $k=>$v)
        {
            $v = rawurlencode($v);
            $processed[] = "$k=$v";
        }
        
        $post_string = implode("&", $processed);

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100000);
        $res = curl_exec($ch);
        
        return json_decode($res);
    }
}
?>