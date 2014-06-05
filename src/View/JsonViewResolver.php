<?php
/**
 * Basic view resolver for converting view models to JSON.
 *
 * Supports only single model class or an array of a single class.
 */
class JsonViewResolver {

    /**
     * The view content type
     */
    public $contentType = 'application/json';

    /**
     * Resolve the view model.
     *
     * @param model View model
     * @return The resolved JSON as a string
     */
    public function resolve($model) {

        if(is_array($model)) {
            if (count($model) == 0) {
                return '[]';
            }

            $properties = $this->analyze($model[0]);

            $jsonArray = array();
            foreach ($model as $e) {
                array_push($jsonArray, $this->build($properties, $e));
            }

            return json_encode($jsonArray);
        }
        else {
            $properties = $this->analyze($model);

            return json_encode($this->build($properties, $model));
        }
    }

    /**
     * Build the associate array to be marshalled
     *
     * @param properties The keys of the associative array
     * @param e The element
     * @return The array
     */
    private function build($properties, $e) {
        $m = array();

        foreach ($properties as $prop) {
            // TODO: Check getter exists
            $m[$prop] = $e->$prop;
        }

        return $m;
    }

    /**
     * Analyze the view model to find available properties (also private).
     *
     * @param obj View model
     * @return An array of property names
     */
    private function analyze($obj) {
        $reflect = new ReflectionObject($obj);

        $struc = array();

        foreach ($reflect->getProperties() as $prop) {
            array_push($struc, $prop->name);
        }

        return $struc;
    }
}
?>