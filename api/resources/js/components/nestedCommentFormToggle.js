const nestedCommentFormToggle = (function () {

    let _allTogglers = document.getElementsByClassName('nestedCommentFormToggler');
    let _countMainComments =_allTogglers.length;
    let _allNestedCommentForms = [];
    for (let i = 0; i < _countMainComments; i++) {
        let mainCommentId = _allTogglers[i].getAttribute("data-mainComment");
        _allNestedCommentForms[i] = document.getElementById("nested-comment-form-" + mainCommentId);
    }

    function toggle()
    {
        for (let i = 0; i < _countMainComments; i++) {
            _allTogglers[i].addEventListener('click', function () {
                if(_allNestedCommentForms[i].hasAttribute('hidden')) {
                    _allNestedCommentForms[i].removeAttribute("hidden");
                } else {
                    let _hidden = document.createAttribute("hidden");
                    _allNestedCommentForms[i].setAttributeNode(_hidden);
                }
            });
        }
    }

    return {
        toggle: toggle()
    }
})();

export default nestedCommentFormToggle;