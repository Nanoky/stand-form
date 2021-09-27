<?php

namespace Nanok\StandForm\Controllers;
use Ngbin\Framework\Entity\Request;

interface ControllerInterface {

        public function index(Request $request);

        public function store(Request $request);

        public function update(Request $request);

        public function destroy(Request $request);
    }

?>