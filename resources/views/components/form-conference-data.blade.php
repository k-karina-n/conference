<x-input label="title" name="title" />
<x-input label="description" name="description" tag="textarea" rows="3"
    placeholder="Description (up to 1000 characters)" maxlength="1000" />
<x-input label="date" name="date" type="date" min="{{ date('Y-m-d') }}" />
