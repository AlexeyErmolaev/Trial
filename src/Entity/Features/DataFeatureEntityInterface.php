<?php
namespace Armor\Trial\Entity\Features;

interface DataFeatureEntityInterface {
  public function getFeatureId();
  public function setFeatureId($Id);
  public function getFeatureLabel();
  public function getFeatureName();
  public function setFeatureAsString($feature);
  public function getLicenseId();
  public function setLicenseId($id);
}