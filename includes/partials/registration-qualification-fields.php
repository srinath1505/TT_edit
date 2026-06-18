<?php
/**
 * Shared registration qualification fields for OTP-enabled lead forms.
 *
 * Optional vars:
 * - $qualificationNamePrefix (string) unique prefix for input names when multiple forms exist on one page
 * - $qualificationIdPrefix (string) unique prefix for element ids
 */
$qualificationNamePrefix = isset($qualificationNamePrefix) ? (string) $qualificationNamePrefix : '';
$qualificationIdPrefix = isset($qualificationIdPrefix) ? (string) $qualificationIdPrefix : '';
$qualificationInputClass = isset($qualificationInputClass) ? (string) $qualificationInputClass : '';
$qualInputClassAttr = $qualificationInputClass !== '' ? ' class="' . htmlspecialchars($qualificationInputClass) . '"' : '';
$id = function ($suffix) use ($qualificationIdPrefix) {
  return $qualificationIdPrefix !== '' ? $qualificationIdPrefix . $suffix : $suffix;
};
$name = function ($base) use ($qualificationNamePrefix) {
  return $qualificationNamePrefix . $base;
};
?>
<div class="registration-qualification-fields" data-qual-prefix="<?php echo htmlspecialchars($qualificationNamePrefix); ?>">
  <div class="form-group">
    <label for="<?php echo htmlspecialchars($id('leadAge')); ?>" data-i18n="registrationQualification.ageLabel">What is your age?</label>
    <input
      type="number"
      id="<?php echo htmlspecialchars($id('leadAge')); ?>"
      name="<?php echo htmlspecialchars($name('lead_age')); ?>"
      min="18"
      max="120"
      step="1"
      inputmode="numeric"
      placeholder="e.g. 28"
      required<?php echo $qualInputClassAttr; ?>
    >
  </div>
  <div class="form-group">
    <label for="<?php echo htmlspecialchars($id('leadMonthlyIncome')); ?>" data-i18n="registrationQualification.incomeLabel">What is your monthly income (USD equivalent)?</label>
    <input
      type="number"
      id="<?php echo htmlspecialchars($id('leadMonthlyIncome')); ?>"
      name="<?php echo htmlspecialchars($name('lead_monthly_income')); ?>"
      min="0"
      step="1"
      inputmode="numeric"
      placeholder="e.g. 3000"
      required<?php echo $qualInputClassAttr; ?>
    >
  </div>
  <fieldset class="registration-qualification-radio-group">
    <legend data-i18n="registrationQualification.interestedLabel">Are you interested in opening a trading account?</legend>
    <label>
      <input type="radio" name="<?php echo htmlspecialchars($name('lead_interested_account')); ?>" value="yes" required>
      <span data-i18n="registrationQualification.yes">Yes</span>
    </label>
    <label>
      <input type="radio" name="<?php echo htmlspecialchars($name('lead_interested_account')); ?>" value="no" required>
      <span data-i18n="registrationQualification.no">No</span>
    </label>
  </fieldset>
  <fieldset class="registration-qualification-radio-group">
    <legend data-i18n="registrationQualification.readyLabel">Are you ready to start trading now?</legend>
    <label>
      <input type="radio" name="<?php echo htmlspecialchars($name('lead_ready_to_trade')); ?>" value="yes" required>
      <span data-i18n="registrationQualification.yes">Yes</span>
    </label>
    <label>
      <input type="radio" name="<?php echo htmlspecialchars($name('lead_ready_to_trade')); ?>" value="no" required>
      <span data-i18n="registrationQualification.no">No</span>
    </label>
  </fieldset>
  <fieldset class="registration-qualification-radio-group">
    <legend data-i18n="registrationQualification.depositLabel">Are you able to make the minimum deposit of $100?</legend>
    <label>
      <input type="radio" name="<?php echo htmlspecialchars($name('lead_min_deposit_100')); ?>" value="yes" required>
      <span data-i18n="registrationQualification.yes">Yes</span>
    </label>
    <label>
      <input type="radio" name="<?php echo htmlspecialchars($name('lead_min_deposit_100')); ?>" value="no" required>
      <span data-i18n="registrationQualification.no">No</span>
    </label>
  </fieldset>
</div>
