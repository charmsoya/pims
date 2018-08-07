<?php
public function Article_plates(Request $request)
{
    $q = $request->get('q');

    return {[{"id": 42, "text": "xxx"}]};
}
?>
