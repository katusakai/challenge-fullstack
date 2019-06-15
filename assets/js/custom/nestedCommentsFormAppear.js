const nestedCommentsFormAppear = (function () {

    let _allTogglers = document.getElementsByClassName('nestedCommentFormToggler');
    let _countTogglers = _allTogglers.length;

    let _mainCommentsIdList = [];
    for(let i = 0; i < _countTogglers; i++) {
        _mainCommentsIdList[i] = _allTogglers[i].getAttribute('data-mainComment')
    }

    let _form = document.getElementById('nested-comment-form');
    let _commentIdInputField = document.getElementById('nested_comment_nestedCommentId');

    function _formMove(id) {
        _form.parentNode.removeChild(_form);
        let _formPlace = document.getElementById('nested-comment-form-container-' +_mainCommentsIdList[id]);
        _formPlace.append(_form);
    }

    function _formRemoveHidden() {
        _form.removeAttribute("hidden");
    }

    function toggle()
    {
        for (let i = 0; i < _countTogglers; i++) {
            _allTogglers[i].addEventListener('click', function () {
            _commentIdInputField.value = _mainCommentsIdList[i];
            _formMove(i);
            _formRemoveHidden();
            })
        }
    }

    return {
        toggle: toggle()
    }

})();

export default nestedCommentsFormAppear;