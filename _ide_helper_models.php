<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Emprunt{
/**
 * Class Borrow_history
 *
 * @package Emprunt
 * @property int $id
 * @property string $user
 * @property string $device_type
 * @property string $device_number
 * @property string $device_description
 * @property string $borrow_date
 * @property string $return_date
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Borrow_history whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Borrow_history whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Borrow_history whereDeviceType($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Borrow_history whereDeviceNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Borrow_history whereDeviceDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Borrow_history whereBorrowDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Borrow_history whereReturnDate($value)
 */
	class Borrow_history extends \Eloquent {}
}

namespace Emprunt{
/**
 * Class Regulator
 *
 * @package Emprunt
 * @property int $id
 * @property int $number
 * @property bool $borrowable
 * @property string $brand
 * @property string $model
 * @property string $type
 * @property string $usage
 * @property string $sn_stage_1
 * @property string $sn_stage_2
 * @property string $sn_stage_octo
 * @property int $owner_id
 * @property int $status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\User[] $users
 * @property-read \Emprunt\Status $status
 * @property-read \Emprunt\User $owner
 * @property-read \Emprunt\Regulator_buy $buy
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereBorrowable($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereBrand($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereModel($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereUsage($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereSnStage1($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereSnStage2($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereSnStageOcto($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator whereUpdatedAt($value)
 */
	class Regulator extends \Eloquent {}
}

namespace Emprunt{
/**
 * Emprunt\Regulator_buy
 *
 * @property int $id
 * @property int $regulator_id
 * @property \Carbon\Carbon $date
 * @property float $price
 * @property string $shop
 * @property float $sell_price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Emprunt\Regulator $regulator
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator_buy whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator_buy whereRegulatorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator_buy whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator_buy wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator_buy whereShop($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator_buy whereSellPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator_buy whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Regulator_buy whereUpdatedAt($value)
 */
	class Regulator_buy extends \Eloquent {}
}

namespace Emprunt{
/**
 * Class Stab
 *
 * @package Emprunt
 * @property int $id
 * @property int $number
 * @property bool $borrowable
 * @property string $brand
 * @property string $model
 * @property string $size
 * @property int $owner_id
 * @property int $status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\User[] $users
 * @property-read \Emprunt\Status $status
 * @property-read \Emprunt\User $owner
 * @property-read \Emprunt\Stab_buy $buy
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereBorrowable($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereBrand($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereModel($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab whereUpdatedAt($value)
 */
	class Stab extends \Eloquent {}
}

namespace Emprunt{
/**
 * Emprunt\Stab_buy
 *
 * @property int $id
 * @property int $stab_id
 * @property \Carbon\Carbon $date
 * @property float $price
 * @property string $shop
 * @property float $sell_price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Emprunt\Stab $stab
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab_buy whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab_buy whereStabId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab_buy whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab_buy wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab_buy whereShop($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab_buy whereSellPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab_buy whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Stab_buy whereUpdatedAt($value)
 */
	class Stab_buy extends \Eloquent {}
}

namespace Emprunt{
/**
 * Class Status
 *
 * @package Emprunt
 * @property int $id
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Emprunt\Tank $tanks
 * @property-read \Emprunt\Regulator $regulators
 * @property-read \Emprunt\Stab $stabs
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Status whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Status whereUpdatedAt($value)
 */
	class Status extends \Eloquent {}
}

namespace Emprunt{
/**
 * Class Tank
 *
 * @package Emprunt
 * @property int $id
 * @property int $number
 * @property bool $borrowable
 * @property string $brand
 * @property string $model
 * @property string $size
 * @property string $sn_valve
 * @property string $sn_cylinder
 * @property int $test_pressure
 * @property int $operating_pressure
 * @property string $usage
 * @property int $owner_id
 * @property int $status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\User[] $users
 * @property-read \Emprunt\User $owner
 * @property-read \Emprunt\Status $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\Tiv[] $tivs
 * @property-read \Emprunt\Tank_buy $buy
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereBorrowable($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereBrand($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereModel($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereSnValve($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereSnCylinder($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereTestPressure($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereOperatingPressure($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereUsage($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank whereUpdatedAt($value)
 */
	class Tank extends \Eloquent {}
}

namespace Emprunt{
/**
 * Emprunt\Tank_buy
 *
 * @property int $id
 * @property int $tank_id
 * @property string $maker
 * @property string $thread_type
 * @property \Carbon\Carbon|null $date
 * @property float $price
 * @property string $shop
 * @property float $sell_price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Emprunt\Tank $tank
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereTankId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereMaker($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereThreadType($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereShop($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereSellPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tank_buy whereUpdatedAt($value)
 */
	class Tank_buy extends \Eloquent {}
}

namespace Emprunt{
/**
 * Emprunt\Tiv
 *
 * @property int $id
 * @property int $tank_id
 * @property int $review_id
 * @property int $reviewer_id
 * @property \Carbon\Carbon $review_date
 * @property \Carbon\Carbon|null $previous_review_date
 * @property \Carbon\Carbon $next_test_date
 * @property int $review_status_id
 * @property \Carbon\Carbon|null $shipping_date
 * @property int $valve_id
 * @property int $valve_ring_id
 * @property int $neck_thread_id
 * @property int $neck_thread_size_id
 * @property int $ext_state_id
 * @property int $int_state_id
 * @property bool $int_oil
 * @property int $int_residue_id
 * @property int $todo_maintenance_id
 * @property int $performed_maintenance_id
 * @property int $recipient_id
 * @property string $comment
 * @property int $decision_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Emprunt\Tank $tank
 * @property-read \Emprunt\Tiv_status $valve
 * @property-read \Emprunt\Tiv_status $ext_state
 * @property-read \Emprunt\Tiv_status $int_residue
 * @property-read \Emprunt\Tiv_status $int_state
 * @property-read \Emprunt\Tiv_status $neck_thread
 * @property-read \Emprunt\Tiv_status $neck_thread_size
 * @property-read \Emprunt\Tiv_status $performed_maintenance
 * @property-read \Emprunt\Tiv_status $review
 * @property-read \Emprunt\Tiv_status $review_status
 * @property-read \Emprunt\Tiv_status $todo_maintenance
 * @property-read \Emprunt\Tiv_status $valve_ring
 * @property-read \Emprunt\Tiv_status $recipient
 * @property-read \Emprunt\User $reviewer
 * @property-read \Emprunt\Tiv_status $decision
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereTankId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereReviewId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereReviewerId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereReviewDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv wherePreviousReviewDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereNextTestDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereReviewStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereShippingDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereValveId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereValveRingId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereNeckThreadId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereNeckThreadSizeId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereExtStateId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereIntStateId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereIntOil($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereIntResidueId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereTodoMaintenanceId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv wherePerformedMaintenanceId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereRecipientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereDecisionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv whereUpdatedAt($value)
 */
	class Tiv extends \Eloquent {}
}

namespace Emprunt{
/**
 * Emprunt\Tiv_status
 *
 * @property int $id
 * @property string $type
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv_status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv_status whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv_status whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv_status whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\Tiv_status whereUpdatedAt($value)
 */
	class Tiv_status extends \Eloquent {}
}

namespace Emprunt{
/**
 * Class User
 *
 * @package Emprunt
 * @property int $id
 * @property string $lastname
 * @property string $firstname
 * @property string $email
 * @property string $phone_fix
 * @property string $phone_mob
 * @property string $phone_work
 * @property string $licence
 * @property string $password
 * @property bool $active
 * @property bool $tank
 * @property bool $stab
 * @property bool $regulator
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\Regulator[] $regulators
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\Stab[] $stabs
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\Tank[] $tanks
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\Tank[] $personal_tanks
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\Regulator[] $personal_regulators
 * @property-read \Illuminate\Database\Eloquent\Collection|\Emprunt\Stab[] $personal_stabs
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User wherePhoneFix($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User wherePhoneMob($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User wherePhoneWork($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereLicence($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereTank($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereStab($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereRegulator($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Emprunt\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

