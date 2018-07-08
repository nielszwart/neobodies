<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="physical_test")
 * @ORM\Entity()
 */
class PhysicalTest
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Genblueprint", inversedBy="physical_test")
     */
    private $genblueprint;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bicep_curl_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bicep_curl_80;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tricep_extension_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tricep_extension_80;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leg_extension_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leg_extension_80;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leg_curl_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leg_curl_80;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chest_press_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chest_press_80;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lat_pulley_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lat_pulley_80;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shoulder_press_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shoulder_press_80;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $waist;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $belly;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hip;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $upper_arm;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chest;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $neck;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $upper_leg;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lower_leg;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cheek;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $armpit_chest;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tricep;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bicep;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $back_shoulderblade;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lower_back;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $torso_upper_right;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $waist_right;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $waist_front_right;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $belly_button;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $knee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $calf;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $upper_leg_front;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $upper_leg_back;

    public function __construct(Genblueprint $genblueprint, array $data = [])
    {
        $this->setGenblueprint($genblueprint);
        $this->edit($data);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBicepCurlMax()
    {
        return $this->bicep_curl_max;
    }

    public function setBicepCurlMax($bicep_curl_max)
    {
        $this->bicep_curl_max = $bicep_curl_max;
    }

    public function getBicepCurl80()
    {
        return $this->bicep_curl_80;
    }

    public function setBicepCurl80($bicep_curl_80)
    {
        $this->bicep_curl_80 = $bicep_curl_80;
    }

    public function getTricepExtensionMax()
    {
        return $this->tricep_extension_max;
    }

    public function setTricepExtensionMax($tricep_extension_max)
    {
        $this->tricep_extension_max = $tricep_extension_max;
    }

    public function getTricepExtension80()
    {
        return $this->tricep_extension_80;
    }

    public function setTricepExtension80($tricep_extension_80)
    {
        $this->tricep_extension_80 = $tricep_extension_80;
    }

    public function getLegExtensionMax()
    {
        return $this->leg_extension_max;
    }

    public function setLegExtensionMax($leg_extension_max)
    {
        $this->leg_extension_max = $leg_extension_max;
    }

    public function getLegExtension80()
    {
        return $this->leg_extension_80;
    }

    public function setLegExtension80($leg_extension_80)
    {
        $this->leg_extension_80 = $leg_extension_80;
    }

    public function getLegCurlMax()
    {
        return $this->leg_curl_max;
    }

    public function setLegCurlMax($leg_curl_max)
    {
        $this->leg_curl_max = $leg_curl_max;
    }

    public function getLegCurl80()
    {
        return $this->leg_curl_80;
    }

    public function setLegCurl80($leg_curl_80)
    {
        $this->leg_curl_80 = $leg_curl_80;
    }

    public function getChestPressMax()
    {
        return $this->chest_press_max;
    }

    public function setChestPressMax($chest_press_max)
    {
        $this->chest_press_max = $chest_press_max;
    }

    public function getChestPress80()
    {
        return $this->chest_press_80;
    }

    public function setChestPress80($chest_press_80)
    {
        $this->chest_press_80 = $chest_press_80;
    }

    public function getLatPulleyMax()
    {
        return $this->lat_pulley_max;
    }

    public function setLatPulleyMax($lat_pulley_max)
    {
        $this->lat_pulley_max = $lat_pulley_max;
    }

    public function getLatPulley80()
    {
        return $this->lat_pulley_80;
    }

    public function setLatPulley80($lat_pulley_80)
    {
        $this->lat_pulley_80 = $lat_pulley_80;
    }

    public function getShoulderPressMax()
    {
        return $this->shoulder_press_max;
    }

    public function setShoulderPressMax($shoulder_press_max)
    {
        $this->shoulder_press_max = $shoulder_press_max;
    }

    public function getShoulderPress80()
    {
        return $this->shoulder_press_80;
    }

    public function setShoulderPress80($shoulder_press_80)
    {
        $this->shoulder_press_80 = $shoulder_press_80;
    }

    public function getWaist()
    {
        return $this->waist;
    }

    public function setWaist($waist)
    {
        $this->waist = $waist;
    }

    public function getBelly()
    {
        return $this->belly;
    }

    public function setBelly($belly)
    {
        $this->belly = $belly;
    }

    public function getHip()
    {
        return $this->hip;
    }

    public function setHip($hip)
    {
        $this->hip = $hip;
    }

    public function getUpperArm()
    {
        return $this->upper_arm;
    }

    public function setUpperArm($upper_arm)
    {
        $this->upper_arm = $upper_arm;
    }

    public function getChest()
    {
        return $this->chest;
    }

    public function setChest($chest)
    {
        $this->chest = $chest;
    }

    public function getNeck()
    {
        return $this->neck;
    }

    public function setNeck($neck)
    {
        $this->neck = $neck;
    }

    public function getUpperLeg()
    {
        return $this->upper_leg;
    }

    public function setUpperLeg($upper_leg)
    {
        $this->upper_leg = $upper_leg;
    }

    public function getLowerLeg()
    {
        return $this->lower_leg;
    }

    public function setLowerLeg($lower_leg)
    {
        $this->lower_leg = $lower_leg;
    }

    public function getChin()
    {
        return $this->chin;
    }

    public function setChin($chin)
    {
        $this->chin = $chin;
    }

    public function getCheek()
    {
        return $this->cheek;
    }

    public function setCheek($cheek)
    {
        $this->cheek = $cheek;
    }

    public function getArmpitChest()
    {
        return $this->armpit_chest;
    }

    public function setArmpitChest($armpit_chest)
    {
        $this->armpit_chest = $armpit_chest;
    }

    public function getTricep()
    {
        return $this->tricep;
    }

    public function setTricep($tricep)
    {
        $this->tricep = $tricep;
    }

    public function getBicep()
    {
        return $this->bicep;
    }

    public function setBicep($bicep)
    {
        $this->bicep = $bicep;
    }

    public function getBackShoulderblade()
    {
        return $this->back_shoulderblade;
    }

    public function setBackShoulderblade($back_shoulderblade)
    {
        $this->back_shoulderblade = $back_shoulderblade;
    }

    public function getLowerBack()
    {
        return $this->lower_back;
    }

    public function setLowerBack($lower_back)
    {
        $this->lower_back = $lower_back;
    }

    public function getTorsoUpperRight()
    {
        return $this->torso_upper_right;
    }

    public function setTorsoUpperRight($torso_upper_right)
    {
        $this->torso_upper_right = $torso_upper_right;
    }

    public function getWaistRight()
    {
        return $this->waist_right;
    }

    public function setWaistRight($waist_right)
    {
        $this->waist_right = $waist_right;
    }

    public function getWaistFrontRight()
    {
        return $this->waist_front_right;
    }

    public function setWaistFrontRight($waist_front_right)
    {
        $this->waist_front_right = $waist_front_right;
    }

    public function getBellyButton()
    {
        return $this->belly_button;
    }

    public function setBellyButton($belly_button)
    {
        $this->belly_button = $belly_button;
    }

    public function getKnee()
    {
        return $this->knee;
    }

    public function setKnee($knee)
    {
        $this->knee = $knee;
    }

    public function getCalf()
    {
        return $this->calf;
    }

    public function setCalf($calf)
    {
        $this->calf = $calf;
    }

    public function getUpperLegFront()
    {
        return $this->upper_leg_front;
    }

    public function setUpperLegFront($upper_leg_front)
    {
        $this->upper_leg_front = $upper_leg_front;
    }

    public function getUpperLegBack()
    {
        return $this->upper_leg_back;
    }

    public function setUpperLegBack($upper_leg_back)
    {
        $this->upper_leg_back = $upper_leg_back;
    }

    public function getGenblueprint()
    {
        return $this->genblueprint;
    }

    public function setGenblueprint($genblueprint)
    {
        $this->genblueprint = $genblueprint;
    }

    public function edit($data)
    {
        if (isset($data['bicep_curl_max'])) {
            $this->setBicepCurlMax($data['bicep_curl_max']);
        }
        if (isset($data['bicep_curl_80'])) {
            $this->setBicepCurl80($data['bicep_curl_80']);
        }
        if (isset($data['tricep_extension_max'])) {
            $this->setTricepExtensionMax($data['tricep_extension_max']);
        }
        if (isset($data['tricep_extension_80'])) {
            $this->setTricepExtension80($data['tricep_extension_80']);
        }
        if (isset($data['leg_extension_max'])) {
            $this->setLegExtensionMax($data['leg_extension_max']);
        }
        if (isset($data['leg_extension_80'])) {
            $this->setLegExtension80($data['leg_extension_80']);
        }
        if (isset($data['leg_curl_max'])) {
            $this->setLegCurlMax($data['leg_curl_max']);
        }
        if (isset($data['leg_curl_80'])) {
            $this->setLegCurl80($data['leg_curl_80']);
        }
        if (isset($data['chest_press_max'])) {
            $this->setChestPressMax($data['chest_press_max']);
        }
        if (isset($data['chest_press_80'])) {
            $this->setChestPress80($data['chest_press_80']);
        }
        if (isset($data['lat_pulley_max'])) {
            $this->setLatPulleyMax($data['lat_pulley_max']);
        }
        if (isset($data['lat_pulley_80'])) {
            $this->setLatPulley80($data['lat_pulley_80']);
        }
        if (isset($data['shoulder_press_max'])) {
            $this->setShoulderPressMax($data['shoulder_press_max']);
        }
        if (isset($data['shoulder_press_80'])) {
            $this->setShoulderPress80($data['shoulder_press_80']);
        }
        if (isset($data['waist'])) {
            $this->setWaist($data['waist']);
        }
        if (isset($data['belly'])) {
            $this->setBelly($data['belly']);
        }
        if (isset($data['hip'])) {
            $this->setHip($data['hip']);
        }
        if (isset($data['upper_arm'])) {
            $this->setUpperArm($data['upper_arm']);
        }
        if (isset($data['chest'])) {
            $this->setChest($data['chest']);
        }
        if (isset($data['neck'])) {
            $this->setNeck($data['neck']);
        }
        if (isset($data['upper_leg'])) {
            $this->setUpperLeg($data['upper_leg']);
        }
        if (isset($data['lower_leg'])) {
            $this->setLowerLeg($data['lower_leg']);
        }
        if (isset($data['chin'])) {
            $this->setChin($data['chin']);
        }
        if (isset($data['cheek'])) {
            $this->setCheek($data['cheek']);
        }
        if (isset($data['armpit_chest'])) {
            $this->setArmpitChest($data['armpit_chest']);
        }
        if (isset($data['tricep'])) {
            $this->setTricep($data['tricep']);
        }
        if (isset($data['bicep'])) {
            $this->setBicep($data['bicep']);
        }
        if (isset($data['back_shoulderblade'])) {
            $this->setBackShoulderblade($data['back_shoulderblade']);
        }
        if (isset($data['lower_back'])) {
            $this->setLowerBack($data['lower_back']);
        }
        if (isset($data['torso_upper_right'])) {
            $this->setTorsoUpperRight($data['torso_upper_right']);
        }
        if (isset($data['waist_right'])) {
            $this->setWaistRight($data['waist_right']);
        }
        if (isset($data['waist_front_right'])) {
            $this->setWaistFrontRight($data['waist_front_right']);
        }
        if (isset($data['belly_button'])) {
            $this->setBellyButton($data['belly_button']);
        }
        if (isset($data['knee'])) {
            $this->setKnee($data['knee']);
        }
        if (isset($data['calf'])) {
            $this->setCalf($data['calf']);
        }
        if (isset($data['upper_leg_front'])) {
            $this->setUpperLegFront($data['upper_leg_front']);
        }
        if (isset($data['upper_leg_back'])) {
            $this->setUpperLegBack($data['upper_leg_back']);
        }
    }
}
