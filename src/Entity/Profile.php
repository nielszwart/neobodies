<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="profile")
 * @ORM\Entity()
 */
class Profile
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_changed;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $city_of_birth;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $birth_time;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $gender_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $feeling;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $last_sport;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $limits;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $limits_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $complaints;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $complaints_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fysio;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fysio_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $psychic_limits;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $psychic_limits_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $psychotherapy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $psychotherapy_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $eating;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $eating_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $operations;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $operations_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $medication;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $medication_open;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sleep_well;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $not_falling_asleep;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $awake_often;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hard_to_awaken;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $easy_to_relax;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $single;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $living_together;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $married;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $children;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $nine_till_five;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $responsibilities;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $shift_work;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $shift_work_nights;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $freelancer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $three_breaks;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $jobless;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $temporary_jobless;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $stress_family;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $stress_work;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $daily_traffic_jam;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $want_change_life;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $walking;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $no_full_agenda;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $yoga;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $meditate;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $hobbies;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $hobbies_open;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $no_supplements;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $multivitamins;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $protein_shakes;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $omega_3;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $other_supplements;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_supplements_open;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $no_bread;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $some_bread;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $daily_bread;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $some_fat_fish;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $often_fat_fish;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $no_fat_fish;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $only_other_fish;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $seaweed;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $eat_out_often;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vegetarian;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $allergies;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $allergies_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $intolerance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $intolerance_open;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bloated;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $full;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $farting;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $burping;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $stomach_acid;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $digestion_open;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $swollen_belly;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $obstipation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $diarrea;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sported_often;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $group_lessons;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $strength_training;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cardio_training;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sports_open;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $diet;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $diet_open;

    public function __construct()
    {
        $this->date_changed = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDateChanged()
    {
        return $this->date_changed;
    }

    public function setDateChanged($date_changed)
    {
        $this->date_changed = $date_changed;
    }

    public function getCityOfBirth()
    {
        return $this->city_of_birth;
    }

    public function setCityOfBirth($city_of_birth)
    {
        $this->city_of_birth = $city_of_birth;
    }

    public function getBirthTime()
    {
        return $this->birth_time;
    }

    public function setBirthTime($birth_time)
    {
        $this->birth_time = $birth_time;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getFeeling()
    {
        return $this->feeling;
    }

    public function setFeeling($feeling)
    {
        $this->feeling = $feeling;
    }

    public function getLastSport()
    {
        return $this->last_sport;
    }

    public function setLastSport($last_sport)
    {
        $this->last_sport = $last_sport;
    }

    public function getLimits()
    {
        return $this->limits;
    }

    public function setLimits($limits)
    {
        $this->limits = $limits;
    }

    public function getComplaints()
    {
        return $this->complaints;
    }

    public function setComplaints($complaints)
    {
        $this->complaints = $complaints;
    }

    public function getFysio()
    {
        return $this->fysio;
    }

    public function setFysio($fysio)
    {
        $this->fysio = $fysio;
    }

    public function getPsychicLimits()
    {
        return $this->psychic_limits;
    }

    public function setPsychicLimits($psychic_limits)
    {
        $this->psychic_limits = $psychic_limits;
    }

    public function getPsychotherapy()
    {
        return $this->psychotherapy;
    }

    public function setPsychotherapy($psychotherapy)
    {
        $this->psychotherapy = $psychotherapy;
    }

    public function getEating()
    {
        return $this->eating;
    }

    public function setEating($eating)
    {
        $this->eating = $eating;
    }

    public function getOperations()
    {
        return $this->operations;
    }

    public function setOperations($operations)
    {
        $this->operations = $operations;
    }

    public function getMedication()
    {
        return $this->medication;
    }

    public function setMedication($medication)
    {
        $this->medication = $medication;
    }

    public function getAllergies()
    {
        return $this->allergies;
    }

    public function setAllergies($allergies)
    {
        $this->allergies = $allergies;
    }

    public function getIntolerance()
    {
        return $this->intolerance;
    }

    public function setIntolerance($intolerance)
    {
        $this->intolerance = $intolerance;
    }

    public function getDiet()
    {
        return $this->diet;
    }

    public function setDiet($diet)
    {
        $this->diet = $diet;
    }

    public function getGenderOpen()
    {
        return $this->gender_open;
    }

    public function setGenderOpen($gender_open)
    {
        $this->gender_open = $gender_open;
    }

    public function getLimitsOpen()
    {
        return $this->limits_open;
    }

    public function setLimitsOpen($limits_open)
    {
        $this->limits_open = $limits_open;
    }

    public function getComplaintsOpen()
    {
        return $this->complaints_open;
    }

    public function setComplaintsOpen($complaints_open)
    {
        $this->complaints_open = $complaints_open;
    }

    public function getFysioOpen()
    {
        return $this->fysio_open;
    }

    public function setFysioOpen($fysio_open)
    {
        $this->fysio_open = $fysio_open;
    }

    public function getPsychicLimitsOpen()
    {
        return $this->psychic_limits_open;
    }

    public function setPsychicLimitsOpen($psychic_limits_open)
    {
        $this->psychic_limits_open = $psychic_limits_open;
    }

    public function getPsychotherapyOpen()
    {
        return $this->psychotherapy_open;
    }

    public function setPsychotherapyOpen($psychotherapy_open)
    {
        $this->psychotherapy_open = $psychotherapy_open;
    }

    public function getEatingOpen()
    {
        return $this->eating_open;
    }

    public function setEatingOpen($eating_open)
    {
        $this->eating_open = $eating_open;
    }

    public function getOperationsOpen()
    {
        return $this->operations_open;
    }

    public function setOperationsOpen($operations_open)
    {
        $this->operations_open = $operations_open;
    }

    public function getMedicationOpen()
    {
        return $this->medication_open;
    }

    public function setMedicationOpen($medication_open)
    {
        $this->medication_open = $medication_open;
    }

    public function getSleepWell()
    {
        return $this->sleep_well;
    }

    public function setSleepWell($sleep_well)
    {
        $this->sleep_well = $sleep_well;
    }

    public function getNotFallingAsleep()
    {
        return $this->not_falling_asleep;
    }

    public function setNotFallingAsleep($not_falling_asleep)
    {
        $this->not_falling_asleep = $not_falling_asleep;
    }

    public function getAwakeOften()
    {
        return $this->awake_often;
    }

    public function setAwakeOften($awake_often)
    {
        $this->awake_often = $awake_often;
    }

    public function getHardToAwaken()
    {
        return $this->hard_to_awaken;
    }

    public function setHardToAwaken($hard_to_awaken)
    {
        $this->hard_to_awaken = $hard_to_awaken;
    }

    public function getEasyToRelax()
    {
        return $this->easy_to_relax;
    }

    public function setEasyToRelax($easy_to_relax)
    {
        $this->easy_to_relax = $easy_to_relax;
    }

    public function getSingle()
    {
        return $this->single;
    }

    public function setSingle($single)
    {
        $this->single = $single;
    }

    public function getLivingTogether()
    {
        return $this->living_together;
    }

    public function setLivingTogether($living_together)
    {
        $this->living_together = $living_together;
    }

    public function getMarried()
    {
        return $this->married;
    }

    public function setMarried($married)
    {
        $this->married = $married;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function getNineTillFive()
    {
        return $this->nine_till_five;
    }

    public function setNineTillFive($nine_till_five)
    {
        $this->nine_till_five = $nine_till_five;
    }

    public function getResponsibilities()
    {
        return $this->responsibilities;
    }

    public function setResponsibilities($responsibilities)
    {
        $this->responsibilities = $responsibilities;
    }

    public function getShiftWork()
    {
        return $this->shift_work;
    }

    public function setShiftWork($shift_work)
    {
        $this->shift_work = $shift_work;
    }

    public function getShiftWorkNights()
    {
        return $this->shift_work_nights;
    }

    public function setShiftWorkNights($shift_work_nights)
    {
        $this->shift_work_nights = $shift_work_nights;
    }

    public function getFreelancer()
    {
        return $this->freelancer;
    }

    public function setFreelancer($freelancer)
    {
        $this->freelancer = $freelancer;
    }

    public function getThreeBreaks()
    {
        return $this->three_breaks;
    }

    public function setThreeBreaks($three_breaks)
    {
        $this->three_breaks = $three_breaks;
    }

    public function getJobless()
    {
        return $this->jobless;
    }

    public function setJobless($jobless)
    {
        $this->jobless = $jobless;
    }

    public function getTemporaryJobless()
    {
        return $this->temporary_jobless;
    }

    public function setTemporaryJobless($temporary_jobless)
    {
        $this->temporary_jobless = $temporary_jobless;
    }

    public function getStressFamily()
    {
        return $this->stress_family;
    }

    public function setStressFamily($stress_family)
    {
        $this->stress_family = $stress_family;
    }

    public function getStressWork()
    {
        return $this->stress_work;
    }

    public function setStressWork($stress_work)
    {
        $this->stress_work = $stress_work;
    }

    public function getDailyTrafficJam()
    {
        return $this->daily_traffic_jam;
    }

    public function setDailyTrafficJam($daily_traffic_jam)
    {
        $this->daily_traffic_jam = $daily_traffic_jam;
    }

    public function getWantChangeLife()
    {
        return $this->want_change_life;
    }

    public function setWantChangeLife($want_change_life)
    {
        $this->want_change_life = $want_change_life;
    }

    public function getWalking()
    {
        return $this->walking;
    }

    public function setWalking($walking)
    {
        $this->walking = $walking;
    }

    public function getNoFullAgenda()
    {
        return $this->no_full_agenda;
    }

    public function setNoFullAgenda($no_full_agenda)
    {
        $this->no_full_agenda = $no_full_agenda;
    }

    public function getYoga()
    {
        return $this->yoga;
    }

    public function setYoga($yoga)
    {
        $this->yoga = $yoga;
    }

    public function getMeditate()
    {
        return $this->meditate;
    }

    public function setMeditate($meditate)
    {
        $this->meditate = $meditate;
    }

    public function getHobbies()
    {
        return $this->hobbies;
    }

    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;
    }

    public function getHobbiesOpen()
    {
        return $this->hobbies_open;
    }

    public function setHobbiesOpen($hobbies_open)
    {
        $this->hobbies_open = $hobbies_open;
    }

    public function getNoSupplements()
    {
        return $this->no_supplements;
    }

    public function setNoSupplements($no_supplements)
    {
        $this->no_supplements = $no_supplements;
    }

    public function getMultivitamins()
    {
        return $this->multivitamins;
    }

    public function setMultivitamins($multivitamins)
    {
        $this->multivitamins = $multivitamins;
    }

    public function getProteinShakes()
    {
        return $this->protein_shakes;
    }

    public function setProteinShakes($protein_shakes)
    {
        $this->protein_shakes = $protein_shakes;
    }

    public function getOmega3()
    {
        return $this->omega_3;
    }

    public function setOmega3($omega_3)
    {
        $this->omega_3 = $omega_3;
    }

    public function getOtherSupplements()
    {
        return $this->other_supplements;
    }

    public function setOtherSupplements($other_supplements)
    {
        $this->other_supplements = $other_supplements;
    }

    public function getOtherSupplementsOpen()
    {
        return $this->other_supplements_open;
    }

    public function setOtherSupplementsOpen($other_supplements_open)
    {
        $this->other_supplements_open = $other_supplements_open;
    }

    public function getNoBread()
    {
        return $this->no_bread;
    }

    public function setNoBread($no_bread)
    {
        $this->no_bread = $no_bread;
    }

    public function getSomeBread()
    {
        return $this->some_bread;
    }

    public function setSomeBread($some_bread)
    {
        $this->some_bread = $some_bread;
    }

    public function getDailyBread()
    {
        return $this->daily_bread;
    }

    public function setDailyBread($daily_bread)
    {
        $this->daily_bread = $daily_bread;
    }

    public function getSomeFatFish()
    {
        return $this->some_fat_fish;
    }

    public function setSomeFatFish($some_fat_fish)
    {
        $this->some_fat_fish = $some_fat_fish;
    }

    public function getOftenFatFish()
    {
        return $this->often_fat_fish;
    }

    public function setOftenFatFish($often_fat_fish)
    {
        $this->often_fat_fish = $often_fat_fish;
    }

    public function getNoFatFish()
    {
        return $this->no_fat_fish;
    }

    public function setNoFatFish($no_fat_fish)
    {
        $this->no_fat_fish = $no_fat_fish;
    }

    public function getOnlyOtherFish()
    {
        return $this->only_other_fish;
    }

    public function setOnlyOtherFish($only_other_fish)
    {
        $this->only_other_fish = $only_other_fish;
    }

    public function getSeaweed()
    {
        return $this->seaweed;
    }

    public function setSeaweed($seaweed)
    {
        $this->seaweed = $seaweed;
    }

    public function getEatOutOften()
    {
        return $this->eat_out_often;
    }

    public function setEatOutOften($eat_out_often)
    {
        $this->eat_out_often = $eat_out_often;
    }

    public function getVegetarian()
    {
        return $this->vegetarian;
    }

    public function setVegetarian($vegetarian)
    {
        $this->vegetarian = $vegetarian;
    }

    public function getAllergiesOpen()
    {
        return $this->allergies_open;
    }

    public function setAllergiesOpen($allergies_open)
    {
        $this->allergies_open = $allergies_open;
    }

    public function getIntoleranceOpen()
    {
        return $this->intolerance_open;
    }

    public function setIntoleranceOpen($intolerance_open)
    {
        $this->intolerance_open = $intolerance_open;
    }

    public function getBloated()
    {
        return $this->bloated;
    }

    public function setBloated($bloated)
    {
        $this->bloated = $bloated;
    }

    public function getFull()
    {
        return $this->full;
    }

    public function setFull($full)
    {
        $this->full = $full;
    }

    public function getFarting()
    {
        return $this->farting;
    }

    public function setFarting($farting)
    {
        $this->farting = $farting;
    }

    public function getBurping()
    {
        return $this->burping;
    }

    public function setBurping($burping)
    {
        $this->burping = $burping;
    }

    public function getStomachAcid()
    {
        return $this->stomach_acid;
    }

    public function setStomachAcid($stomach_acid)
    {
        $this->stomach_acid = $stomach_acid;
    }

    public function getDigestionOpen()
    {
        return $this->digestion_open;
    }

    public function setDigestionOpen($digestion_open)
    {
        $this->digestion_open = $digestion_open;
    }

    public function getSwollenBelly()
    {
        return $this->swollen_belly;
    }

    public function setSwollenBelly($swollen_belly)
    {
        $this->swollen_belly = $swollen_belly;
    }

    public function getObstipation()
    {
        return $this->obstipation;
    }

    public function setObstipation($obstipation)
    {
        $this->obstipation = $obstipation;
    }

    public function getDiarrea()
    {
        return $this->diarrea;
    }

    public function setDiarrea($diarrea)
    {
        $this->diarrea = $diarrea;
    }

    public function getSportedOften()
    {
        return $this->sported_often;
    }

    public function setSportedOften($sported_often)
    {
        $this->sported_often = $sported_often;
    }

    public function getGroupLessons()
    {
        return $this->group_lessons;
    }

    public function setGroupLessons($group_lessons)
    {
        $this->group_lessons = $group_lessons;
    }

    public function getStrengthTraining()
    {
        return $this->strength_training;
    }

    public function setStrengthTraining($strength_training)
    {
        $this->strength_training = $strength_training;
    }

    public function getCardioTraining()
    {
        return $this->cardio_training;
    }

    public function setCardioTraining($cardio_training)
    {
        $this->cardio_training = $cardio_training;
    }

    public function getSportsOpen()
    {
        return $this->sports_open;
    }

    public function setSportsOpen($sports_open)
    {
        $this->sports_open = $sports_open;
    }

    public function getDietOpen()
    {
        return $this->diet_open;
    }

    public function setDietOpen($diet_open)
    {
        $this->diet_open = $diet_open;
    }
}
