<?php
/**
 * Class IntrestCalc
 */

class IntrestCalc
{
   private $investmentAmount;
   private $yearlyInterestRate;
   private $numberOfYears;
   private $future_value;
   private $compoundedMonthy;
   /**
    * Class constructor.
    * @param float $investmentAmount;
    * @param float $yearlyInterestRate;
    * @param int $numberOfYears;
    * @param float $future_value;
    */
   public function __construct(
      $investmentAmount,
      $yearlyInterestRate,
      $numberOfYears,
      $compoundedMonthly
   ) {
      $this->investmentAmount = $investmentAmount;
      $this->yearlyInterestRate = $yearlyInterestRate;
      $this->numberOfYears = $numberOfYears;
      $this->compoundedMonthy = $compoundedMonthly;
      //store investment value on construct
      //choose between compoundedmonthly or not
      boolVal($compoundedMonthly)? $this->calculateCompoundedFutureVal(): $this->calcFurureValue();;
   }
   public function __getInvestmentAmount()
   {
      return $this->investmentAmount;
   }
   public function __getYearlyIntrestRate()
   {
      return $this->yearlyInterestRate;
   }
   public function __getNumberOfYears()
   {
      return $this->numberOfYears;
   }
   public function __getCompoundedMonthly()
   {
      return boolVal($this->compoundedMonthy)? 'Yes' : 'No';
   }

   public function validateEntry()
   {
      $error_message = array('investment','interest_rate','years');
      if ($this->investmentAmount === false) {
         $error_message['investment'] = 'Investment must be a valid number.';
      } 
      if($this->investmentAmount <= 0 && $this->investmentAmount !== false) {
         $error_message['investment'] = 'Investment must be greater than zero.';
         // validate interest rate
      } 
      if (boolVal($this->yearlyInterestRate) === false) {
         $error_message['interest_rate'] = "Interest rate must be a valid number.";
      } 
      if ($this->yearlyInterestRate !== false && $this->yearlyInterestRate <= 0) {
        $error_message['interest_rate'] = 'Intrest rate must be greater than zero.';
         // validate years
      } 
      if ( $this->numberOfYears === false) {
         $error_message['years'] = 'Years must be a valid whole number.';
      } 
      if ($this->numberOfYears !== false && $this->numberOfYears <= 0) {
         $error_message['years'] = 'Years must be greater than zero.';
      } 
      if ($this->numberOfYears > 30) {
         $error_message['years'] = 'Years must be less than 31.';
      } 
      return $error_message;
   }
   public function __getFormatNumbers()
   {
      // apply currency and percent formatting
      $formattedNumbers = array();
      $formattedNumbers['investment_f'] = '$' . number_format($this->investmentAmount, 2);
      $formattedNumbers['yearly_rate_f'] = $this->yearlyInterestRate . '%';
      $formattedNumbers['future_value_f'] = '$' . number_format($this->future_value, 2);
      return $formattedNumbers;
   }
   private function calcFurureValue()
   {
      // calculate the future value non compounding 
      //A = principal investment + (principal investment * interest rate * number of years)
     $this->future_value = $this->investmentAmount + ($this->investmentAmount * $this->numberOfYears * ($this->yearlyInterestRate * 0.01));
   }
   private function calculateCompoundedFutureVal()
   {
      //A = principal investment (1 + annual intrest rate/ number of months) (number of months * number of years)
      $future_value = $this->investmentAmount * pow(( 1 + (($this->yearlyInterestRate * .01)/12)),( 12 * $this->numberOfYears));
      $this->future_value =$future_value;
   }
   public function __getCalculationDate()
   {
      return date_format(date_create(),"m/d/Y");
   }
}
?>