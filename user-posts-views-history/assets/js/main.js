window.onload = function() {
    /*
     * get post data
    */
   let postTitleElem = document.querySelector('h1');
    if(postTitleElem !== null) {
      postTitle = document.querySelector('h1').textContent;
    }
    
    let postDate = new Date().toJSON();

    let url = window.location.href.replace(/\/$/, '');

 /*
  * check if post data exists
 */
function checkIfPostDataExists() {
    for (let key of Object.keys(window.localStorage)) {

        if(key.startsWith('postData_')) {
            return true;
        }
    }
}

/*
* get localStorage posts objects
*/
function getLocalStoragePostsObjects() {
       const localStoragePostsObjects = [];
    
for (let key of Object.keys(window.localStorage)) {

    if(key.startsWith('postData_')) { 
        let item = JSON.parse(localStorage[key]);
         localStoragePostsObjects.push(item);
          localStoragePostsObjects.sort((a, b) => (new Date(a.postDateUnique)) - (new Date(b.postDateUnique)));
          localStoragePostsObjects.reverse();
    }
}

return  localStoragePostsObjects;
}

/*
* get localStorage posts keys ends
*/
function getLocalStoragePostsKeysEnds () {
      const localStoragePostsKeysEnds = [];
    
for (let key of Object.keys(window.localStorage)) {

    if(key.startsWith('postData_')) { 
      keyArr = key.split('_');
      postKeyEnd = keyArr[1];
         localStoragePostsKeysEnds.push(postKeyEnd);
         
    }
   
}
     return localStoragePostsKeysEnds;
}

/*
 * jquery ajax - set postsIds and postId variables on success 
*/
                 jQuery.ajax({
    type: "post",
    dataType: "json",
    async: false,
    url: my_ajax_object.ajax_url,
    data: { 
      action: 'postaction', 
      postUrl: url
    },
    action: 'myaction',
    success: function(json){
        if( json.success ) {
				postsIds = json.data.postsIds;
				if (json.data.postId != 0 && typeof json.data.postId == 'number') {
				postId = json.data.postId;
                }
        }
    }
});

/* 
 * delete item in localStorage if such post id does not exist 
*/
if(typeof postsIds !== 'undefined') {
localStoragePostsKeysEndsArr = getLocalStoragePostsKeysEnds();
let postsIdsArr = [];
 
postsIdsArr = postsIds;
let MissingPostsIdsArr = localStoragePostsKeysEndsArr.filter(i => !postsIdsArr.includes(parseInt(i)));

if(MissingPostsIdsArr.length) {
    MissingPostsIdsArr.forEach(function(item) {
     
    localStorage.removeItem('postData_'+item);
    });
}
}

    /*
     * save post data in localstorage
    */
   if(typeof isPostPage !== 'undefined' && typeof postId !== 'undefined') {
            if (JSON.parse(isPostPage) == true && window.location.href.indexOf(window.location.origin+'/wp-admin') == -1)  {
          
       let localStoragePostKey = 'postData_'+ JSON.stringify(postId);
        const postData = {};
                postData.postAddressUnique = url;
                postData.postTitleUnique = postTitle;
                postData.postDateUnique = postDate;
                
                 localStorage.setItem(localStoragePostKey, JSON.stringify(postData));
            }
}
             
    /*
     * add ul list with posts data
    */
	elementWidget = document.querySelector('.widget_widget_your_posts_views_history');
	
	if(elementWidget !== null &&  checkIfPostDataExists() == true && typeof count !== 'undefined') {
	     let ul = document.createElement('ul');
	   elementWidget.appendChild(ul).classList.add('posts-views-history-list');
	    elementUl = document.querySelector('.posts-views-history-list');

	  let titleWidgetEl = beforeTitle.replace('<','');
	  titleWidgetEl= titleWidgetEl.replace('>','');
	 let  titleWidgetTag = titleWidgetEl.substring(0, 2);
	 
	 let titleElem = document.createElement(titleWidgetTag);
     titleElem.textContent = widgetTitle;
          
	 if(titleWidgetEl.length > 2) {
	    titleWidgetElArr = titleWidgetEl.split(' ');
	     titleWidgetElArr.forEach(function(item) {
	         if(item.startsWith('class=')) {
	            let titleWidgetClass = item;
	             let titleWidgetClassArr = titleWidgetClass.split('=');
	             titleWidgetClass = titleWidgetClassArr[1].replace(/["']/g,'');
	             titleElem.classList.add(titleWidgetClass);
	         }
	     }); 
	 }
          
          elementUl.before(titleElem);
	    
	    const html = [];
	    
	    const localStoragePostsObjects = getLocalStoragePostsObjects();

 const lastPosts = localStoragePostsObjects.slice(0, count);
         
    lastPosts.forEach(function(item) {
         let postDate = item.postDateUnique;
         postDate = new Date(postDate);
      
         let postFullYear = postDate.getFullYear();
         let postMonth = postDate.getMonth() + 1;
          if (postMonth < 10) {
              postMonth = '0'+postMonth;
          }
         let postDay = postDate.getDate();
         if(postDay < 10) {
            postDay = '0' + postDay;
         }
         let postDateFormat = postDay+"-"+postMonth+"-"+postFullYear;
      html.push('<li><a href="'+item.postAddressUnique+'">'+item.postTitleUnique+'</a><span>'+postDateFormat+'</span></li>');
    
    });
    
    elementUl.innerHTML = html.join('');
	}
	
};
