<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    /* public $timestamps = false; */

    protected $fillable = ['tractor', 'texnica', 'lesa', 'tours', 'gazelnew', 'gazelold',
     'username', 'rama', 'ramadioganal', 'conect', 'nastil', 'rigel', 'bash', 'jack',
     'footing1_5', 'area0_45', 'rama1_2', 'rigel2', 'link0_7', 'rama1_1', 'emphasis', 'footing0_7', 'area07_15', 'rama0_7', 'rigel1_5', 'rama0_7_1', 'footing2_4', 'pipe', 'rama1_4', 'link0_9'];

        protected $table = 'stock';


        public function setTractorAttribute($value)
        {
            $this->attributes['tractor'] = $value ?? $this->attributes['tractor'];
        }

        public function setTexnicaAttribute($value)
        {
            $this->attributes['texnica'] = $value ?? $this->attributes['texnica'];
        }

        public function setLesaAttribute($value)
        {
            $this->attributes['lesa'] = $value ?? $this->attributes['lesa'];
        }

        public function setToursAttribute($value)
        {
            $this->attributes['tours'] = $value ?? $this->attributes['tours'];
        }

        public function setGazelnewAttribute($value)
        {
            $this->attributes['gazelnew'] = $value ?? $this->attributes['gazelnew'];
        }

        public function setGazeloldAttribute($value)
        {
            $this->attributes['gazelold'] = $value ?? $this->attributes['gazelold'];
        }

        public function setUsernameAttribute($value)
        {
            $this->attributes['username'] = $value ?? $this->attributes['username'];
        }

        public function setRamaAttribute($value)
        {
            $this->attributes['rama'] = $value ?? $this->attributes['rama'];
        }

        public function setRamadioganalAttribute($value)
        {
            $this->attributes['ramadioganal'] = $value ?? $this->attributes['ramadioganal'];
        }

        public function setConectAttribute($value)
        {
            $this->attributes['conect'] = $value ?? $this->attributes['conect'];
        }

        public function setNastilAttribute($value)
        {
            $this->attributes['nastil'] = $value ?? $this->attributes['nastil'];
        }

        public function setRigelAttribute($value)
        {
            $this->attributes['rigel'] = $value ?? $this->attributes['rigel'];
        }

        public function setBashAttribute($value)
        {
            $this->attributes['bash'] = $value ?? $this->attributes['bash'];
        }

        public function setJackAttribute($value)
        {
            $this->attributes['jack'] = $value ?? $this->attributes['jack'];
        }

        public function setFooting1_5Attribute($value)
        {
            $this->attributes['footing1_5'] = $value ?? $this->attributes['footing1_5'];
        }

        public function setArea0_45Attribute($value)
        {
            $this->attributes['area0_45'] = $value ?? $this->attributes['area0_45'];
        }

        public function setRama1_2Attribute($value)
        {
            $this->attributes['rama1_2'] = $value ?? $this->attributes['rama1_2'];
        }

        public function setRigel2Attribute($value)
        {
            $this->attributes['rigel2'] = $value ?? $this->attributes['rigel2'];
        }

        public function setLink0_7Attribute($value)
        {
            $this->attributes['link0_7'] = $value ?? $this->attributes['link0_7'];
        }

        public function setRama1_1Attribute($value)
        {
            $this->attributes['rama1_1'] = $value ?? $this->attributes['rama1_1'];
        }

        public function setEmphasisAttribute($value)
        {
            $this->attributes['emphasis'] = $value ?? $this->attributes['emphasis'];
        }

        public function setFooting0_7Attribute($value)
        {
            $this->attributes['footing0_7'] = $value ?? $this->attributes['footing0_7'];
        }

        public function setArea07_15Attribute($value)
        {
            $this->attributes['area07_15'] = $value ?? $this->attributes['area07_15'];
        }

        public function setRama0_7Attribute($value)
        {
            $this->attributes['rama0_7'] = $value ?? $this->attributes['rama0_7'];
        }

        public function setRigel1_5Attribute($value)
        {
            $this->attributes['rigel1_5'] = $value ?? $this->attributes['rigel1_5'];
        }

        public function setRama0_7_1Attribute($value)
        {
            $this->attributes['rama0_7_1'] = $value ?? $this->attributes['rama0_7_1'];
        }

        public function setFooting2_4Attribute($value)
        {
            $this->attributes['footing2_4'] = $value ?? $this->attributes['footing2_4'];
        }

        public function setPipeAttribute($value)
        {
            $this->attributes['pipe'] = $value ?? $this->attributes['pipe'];
        }

        public function setRama1_4Attribute($value)
        {
            $this->attributes['rama1_4'] = $value ?? $this->attributes['rama1_4'];
        }

        public function setLink0_9Attribute($value)
        {
            $this->attributes['link0_9'] = $value ?? $this->attributes['link0_9'];
        }

}
