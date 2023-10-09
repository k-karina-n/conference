<x-input label="title" data="title" />
<x-input label="description" data="description" tag="textarea" rows="3"
    placeholder="Description (up to 1000 characters)" maxlength="1000" />
<x-input label="date" data="date" type="date" min="{{ date('Y-m-d') }}" />
