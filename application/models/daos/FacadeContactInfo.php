<?php
class FacadeContactInfo
{
    public $contact;
    public $groups;
    public $methods = array();
    
    public function __construct($id)
    {
        $this->contact = new contact($id);
        $this->populateGroups();
        $this->populateMethods();
    }
    
    protected function populateGroups()
    {
        $this->groups = new contactgroupscollection($this->contact);
        $this->groups->getWithData();
    }
    
    protected function populateMethods()
    {
        foreach ($this->groups as $group) {
            $this->methods[$group->id] = new contactmethodscollection($group);
            $this->methods[$group->id]->getWithData();
        }
    }
}
?>