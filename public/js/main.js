var tw = document.getElementById("tweet");
const submit_button = document.getElementById('tweet_button');
    tw.addEventListener("input", function() {
        document.getElementById("tweet_counter").innerHTML = tw.value.length;
        if(tw.value.length >= 140){
            document.getElementById("tweet_counter").classList.remove('text-gray-600');
            document.getElementById("tweet_counter").classList.add('text-red-800');
            submit_button.disabled = true;
        }else{
            document.getElementById("tweet_counter").classList.remove('text-red-800');
            document.getElementById("tweet_counter").classList.add('text-gray-600');
            submit_button.disabled = false;
        }
    });
    
   