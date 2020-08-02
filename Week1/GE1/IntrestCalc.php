<?php
   function validateEntry($investmentAmount, $yearlyInterestRate, $numberOfYears){
      $error_message = array('investment','interest_rate','years');
      if ($investmentAmount === false) {
         $error_message['investment'] = 'Investment must be a valid number.';
      } 
      if($investmentAmount <= 0 && $investmentAmount !== false) {
         $error_message['investment'] = 'Investment must be greater than zero.';
         // validate interest rate
      } 
      if (boolVal($yearlyInterestRate) === false) {
         $error_message['interest_rate'] = "Interest rate must be a valid number.";
      } 
      if ($yearlyInterestRate !== false && $yearlyInterestRate <= 0) {
        $error_message['interest_rate'] = 'Intrest rate must be greater than zero.';
         // validate years
      } 
      if ( $numberOfYears === false) {
         $error_message['years'] = 'Years must be a valid whole number.';
      } 
      if ($numberOfYears !== false && $numberOfYears <= 0) {
         $error_message['years'] = 'Years must be greater than zero.';
      } 
      if ($numberOfYears > 30) {
         $error_message['years'] = 'Years must be less than 31.';
      } 
      return $error_message;
   }
    function formatNumbers($investment, $interest_rate, $years, $isCompounded){
      // apply currency and percent formatting
      $formattedNumbers = array();
      $formattedNumbers['investment_f'] = '$' . number_format($investment, 2);
      $formattedNumbers['yearly_rate_f'] = $interest_rate . '%';

      $getFutureValue = (!$isCompounded) ? calcFurureValue($investment, $interest_rate, $years) : calculateCompoundedFutureVal($investment, $interest_rate, $years);

      $formattedNumbers['future_value_f'] = '$' . number_format($getFutureValue, 2);
      return $formattedNumbers;
   }
   function calcFurureValue($investment, $interest_rate, $years){
      // calculate the future value non compounding 
      //A = principal investment + (principal investment * interest rate * number of years)
     return $investment + ($interest_rate * $years * ($interest_rate * 0.01));
   }
   function calculateCompoundedFutureVal($investment, $interest_rate, $years){
      //A = principal investment (1 + annual intrest rate/ number of months) (number of months * number of years)
      return $investment * pow(( 1 + (($interest_rate * .01)/12)),( 12 * $years));
   
   }
   function __getCalculationDate(){
      return date_format(date_create(),"m/d/Y");
   }
?>