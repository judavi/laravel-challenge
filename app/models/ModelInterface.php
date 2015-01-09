<?php

/**
 *
 * A contract to all the model
 *
 * Interface ModelInterface
 */

interface ModelInterface {

    /**
     * Method to get the created_at attribute in custom format
     *
     * @param $created_at : date in a server format
     * @return string
     */
    public function getCreatedAtAttribute($created_at);

    /**
     * Method to get the updated_at attribute in custom format
     *
     * @param $updated_at : date in a server format
     * @return string
     */
    public function getUpdatedAtAttribute($updated_at);
} 