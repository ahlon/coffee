<?php
class Zone_bo {
    var $id;
    var $name;
    var $zipcode;
    var $parent;
    var $children;
    var $created;
    var $updated;
	/**
     * @return the $id
     */
    public function getId() {
        return $this->id;
    }

	/**
     * @return the $name
     */
    public function getName() {
        return $this->name;
    }

	/**
     * @return the $zipcode
     */
    public function getZipcode() {
        return $this->zipcode;
    }

	/**
     * @return the $parent
     */
    public function getParent() {
        return $this->parent;
    }

	/**
     * @return the $children
     */
    public function getChildren() {
        return $this->children;
    }

	/**
     * @return the $created
     */
    public function getCreated() {
        return $this->created;
    }

	/**
     * @return the $updated
     */
    public function getUpdated() {
        return $this->updated;
    }

	/**
     * @param field_type $id
     */
    public function setId($id) {
        $this->id = $id;
    }

	/**
     * @param field_type $name
     */
    public function setName($name) {
        $this->name = $name;
    }

	/**
     * @param field_type $zipcode
     */
    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
    }

	/**
     * @param field_type $parent
     */
    public function setParent($parent) {
        $this->parent = $parent;
    }

	/**
     * @param field_type $children
     */
    public function setChildren($children) {
        $this->children = $children;
    }

	/**
     * @param field_type $created
     */
    public function setCreated($created) {
        $this->created = $created;
    }

	/**
     * @param field_type $updated
     */
    public function setUpdated($updated) {
        $this->updated = $updated;
    }

    
}