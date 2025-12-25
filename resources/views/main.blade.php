<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body x-data="{datas:[],week:['日','月','火','水','木','金','土'],type:0,createShow:false,createMessage:''}" >
        <div class="w-screen h-screen flex flex-row justify-center  " x-data="{getData(type){axios.get('/api/get?type='+this.type).then(function(response){console.log(response); datas = response.data;});}}" x-init="getData(type); flatpickr('#calendar',{inline:true,'locale':window.Japanese , defaultDate:'today'});">

            <div class=" w-full flex-78 flex flex-col  ">
                <div class="w-full flex flex-col p-2  sm:hidden " >
                    <div class="w-full flex flex-row">
                        <div class="flex-1 border-y border-l " :class="type==0 && 'bg-gray-400'"></div>
                        <div class="flex-20 border flex justify-center" :class="type==0 && 'bg-gray-200'" @click="type=0; getData(type);">未完了の項目</div>
                    </div>
                    <div class="w-full flex flex-row">
                        <div class="flex-1 border-y border-l " :class="type==1 && 'bg-gray-400'"></div>
                        <div class="flex-20 border flex justify-center" :class="type==1 && 'bg-gray-200'" @click="type=1; getData(type);">完了した項目</div>
                    </div>
                    <div class="w-full flex flex-row">
                        <div class="flex-1 border-y border-l " :class="type==2 && 'bg-gray-400'"></div>
                        <div class="flex-20 border flex justify-center" :class="type==2 && 'bg-gray-200'" @click="type=2; getData(type);">削除した項目</div>
                    </div>
                </div>

                <div class=" w-full flex flex-col p-5 overflow-auto">
                    <template class="" x-for="data in datas" :key="data.id">
                        <div class="w-full min-h-12 h-auto border p-2 flex flex-row  shrink-0 @container " :class="data.isFinished ? 'bg-gray-400' : 'bg-gray-200'" x-data="{time:(new Date(data.deadline)),remainDate:(Math.round(10*( (new Date(data.deadline)).getTime() - (Date.now()+1000*60*60*9)) / (1000*60*60*24)))/10}">

                            <div class="flex-3 sm:flex-4  flex items-center">
                                <p class="text-xl " x-text="data.description"></p>
                            </div>

                            <div class="flex-2 flex items-center flex-row border-x ">

                                <p class="text-lg sm:text-2xl flex-2 sm:mx-3" x-text="data.isFinished ? '完了!' : '未完了'"></p>

                                <div class="max-w-10 h-10 flex-1 hidden sm:block">
                                    <svg :class="!(remainDate <= 0 && !data.isFinished) && 'hidden'" xmlns="http://www.w3.org/2000/svg" style="max-width:100%;max-height:82px;" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="82px" viewBox="-0.5 -0.5 82 82"><defs/><g><g data-cell-id="0"><g data-cell-id="1"><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-1"><g><ellipse cx="41" cy="41" rx="40" ry="40" fill="#ffffff" stroke="#000000" stroke-width="2" pointer-events="all" style="fill: light-dark(#ffffff, var(--ge-dark-color, #121212)); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-8"><g><ellipse cx="24" cy="34" rx="2" ry="2" fill="#ffffff" stroke="#ffffff" pointer-events="all" style="fill: rgb(255, 255, 255); stroke: rgb(255, 255, 255);"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-9"><g><ellipse cx="55" cy="34" rx="2" ry="2" fill="#ffffff" stroke="#ffffff" pointer-events="all" style="fill: rgb(255, 255, 255); stroke: rgb(255, 255, 255);"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-11"><g><ellipse cx="27" cy="27" rx="5" ry="5" fill="#191919" stroke="#000000" stroke-width="2" pointer-events="all" style="fill: rgb(25, 25, 25); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-12"><g><ellipse cx="55" cy="27" rx="5" ry="5" fill="#191919" stroke="#000000" stroke-width="2" pointer-events="all" style="fill: rgb(25, 25, 25); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-13"><g><path d="M 31 61 Q 31 51 41 51 Q 51 51 51 61" fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g></g></g></g></svg>
                                    <svg :class="!(remainDate > 0 && remainDate <= 1 && !data.isFinished) && 'hidden'" xmlns="http://www.w3.org/2000/svg" style="max-width:100%;max-height:82px;" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="82px" viewBox="-0.5 -0.5 82 82"><defs/><g><g data-cell-id="0"><g data-cell-id="1"><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-1"><g><ellipse cx="41" cy="41" rx="40" ry="40" fill="#ffffff" stroke="#000000" stroke-width="2" pointer-events="all" style="fill: light-dark(#ffffff, var(--ge-dark-color, #121212)); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-5"><g><path d="M 52 61 L 30 61" fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-6"><g><ellipse cx="26" cy="36" rx="5" ry="5" fill="#191919" stroke="#000000" pointer-events="all" style="fill: rgb(25, 25, 25); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-7"><g><ellipse cx="56" cy="36" rx="5" ry="5" fill="#191919" stroke="#000000" pointer-events="all" style="fill: rgb(25, 25, 25); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-8"><g><ellipse cx="24" cy="34" rx="2" ry="2" fill="#ffffff" stroke="#ffffff" pointer-events="all" style="fill: rgb(255, 255, 255); stroke: rgb(255, 255, 255);"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-9"><g><ellipse cx="55" cy="34" rx="2" ry="2" fill="#ffffff" stroke="#ffffff" pointer-events="all" style="fill: rgb(255, 255, 255); stroke: rgb(255, 255, 255);"/></g></g></g></g></g></svg>
                                    <svg :class="!(data.isFinished || remainDate > 1) && 'hidden'" xmlns="http://www.w3.org/2000/svg" style="max-width:100%;max-height:82px;" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="82px" viewBox="-0.5 -0.5 82 82"><defs/><g><g data-cell-id="0"><g data-cell-id="1"><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-1"><g><ellipse cx="41" cy="41" rx="40" ry="40" fill="#ffffff" stroke="#000000" stroke-width="2" pointer-events="all" style="fill: light-dark(#ffffff, var(--ge-dark-color, #121212)); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-2"><g><path d="M 11 41 Q 11 31 16 26 Q 21 21 26 26 Q 31 31 31 41" fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-3"><g><path d="M 51 41 Q 51 31 56 26 Q 61 21 66 26 Q 71 31 71 41" fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-4"><g><path d="M 31 51 Q 31 61 36 66 Q 41 71 46 66 Q 51 61 51 51" fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="ZgXWvIQ-gyaEbA7SBNC2-5"><g><path d="M 52 51 L 30 51" fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g></g></g></g></svg>
                                </div>
                                <div class="flex-1 hidden sm:block"></div>
                            </div>

                            <div class="flex-2 flex border-r justify-center items-center" x-data="console.log(time+ ' ' + data.deadline);">
                                <p x-text="(time.getMonth()+1)+'月'+time.getDate()+'日'+week[time.getDay()]+'曜日'" class=""></p>
                            </div>

                            <div class="flex-1 flex border-r justify-center items-center">
                                <p x-text="(remainDate <= 0) ? Math.abs(remainDate)+'日経過':'あと'+remainDate+'日'" class=""></p>
                            </div>
                            <div class="flex-1 h-full flex flex-col justify-center ">
                                <div class=" h-7 border bg-white shadow-2xl flex justify-center" @click="axios.post('/api/update',{'id':data.id,'newIsFinished':!data.isFinished}).then(function(response){console.log(response); getData(type);});" x-text="data.isFinished ? '完了取消し':'完了'"></div>
                                <div class=" h-7 border bg-white shadow-2xl flex justify-center" @click="axios.post('/api/delete',{'id':data.id}).then(function(response){console.log(response); getData(type);});" x-text="data.isDeleted ? '完全削除' : '削除'"></div>
                            </div>

                        </div>
                    </template>
                </div>

            </div>
            <div class="h-screen w-screen fixed top-0 left-0 sm:relative sm:h-full sm:w-full sm:flex-22  sm:border-l sm:flex flex-col p-3  bg-white" :class="!createShow && 'hidden'">
                <div class="w-full hidden flex-col p-2  sm:flex " >
                    <div class="w-full flex flex-row">
                        <div class="flex-1 border-y border-l " :class="type==0 && 'bg-gray-400'"></div>
                        <div class="flex-20 border flex justify-center" :class="type==0 && 'bg-gray-200'" @click="type=0; getData(type);">未完了の項目</div>
                    </div>
                    <div class="w-full flex flex-row">
                        <div class="flex-1 border-y border-l " :class="type==1 && 'bg-gray-400'"></div>
                        <div class="flex-20 border flex justify-center" :class="type==1 && 'bg-gray-200'" @click="type=1; getData(type);">完了した項目</div>
                    </div>
                    <div class="w-full flex flex-row">
                        <div class="flex-1 border-y border-l " :class="type==2 && 'bg-gray-400'"></div>
                        <div class="flex-20 border flex justify-center" :class="type==2 && 'bg-gray-200'" @click="type=2; getData(type);">削除した項目</div>
                    </div>
                </div>
                <div class="w-full h-10 p-2 sm:border-t" ><p class="text-xl">新規作成</p></div>
                <div class="w-full ">
                    <form action="/api/create" method="POST" class="flex flex-col" @submit.prevent="createMessage=''; axios.post('/api/create',Object.fromEntries(new FormData($event.target))).then(function(response){console.log(response); getData(type); createMessage='正常に処理されました'}).catch(function(error){console.log(error);  if(typeof error.response == 'undefined'){createMessage = 'エラーが発生しました。';}else{  Object.values(error.response.data.errors).forEach((element)=>createMessage+= element+'\n');}  }) ;">
                        <p class="text-lg my-2">題名</p>
                        <input type="text" class=" border my-2" name="description">
                        <p class="text-lg my-2">締め切り</p>
                        <div class="w-full h-full flex justify-center items-center">
                            <input type="text" class="w-0 h-0 " id="calendar" name="deadline">
                        </div>
                        <button type="submit" class="border my-2">登録</button>
                    </form>
                </div>
                <div class="w-full min-h-10 border border-gray-300 bg-gray-100 p-2 ">
                    <p class="whitespace-pre-line" x-text="createMessage"></p>
                </div>
            </div>
            <div class="fixed w-20  right-10 bottom-10">
                <svg @click="createShow = true;" x-show="!createShow" class="sm:hidden" xmlns="http://www.w3.org/2000/svg" style="max-width:200%;max-height:64px;" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="84px" viewBox="-0.5 -0.5 42 32"><defs/><g><g data-cell-id="0"><g data-cell-id="1"><g data-cell-id="M-Gqk-PIzZ6omj-RPAR_-3"><g><rect x="0" y="0" width="40" height="30" rx="4.5" ry="4.5" fill="#ffffff" stroke="#000000" pointer-events="all" style="fill: light-dark(#ffffff, var(--ge-dark-color, #121212)); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="M-Gqk-PIzZ6omj-RPAR_-4"><g><path d="M 20 20 L 20 10" fill="none" stroke="#000000" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="M-Gqk-PIzZ6omj-RPAR_-6"><g><path d="M 15 14.92 L 25 14.92" fill="none" stroke="#000000" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g></g></g></g></svg>
            </div>
            <div class="fixed w-20  right-3 top-10">
                <svg @click="createShow = false;" x-show="createShow" class="sm:hidden" xmlns="http://www.w3.org/2000/svg" style="max-width:100%;max-height:62px;" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="42px" viewBox="-0.5 -0.5 42 62"><defs/><g><g data-cell-id="0"><g data-cell-id="1"><g data-cell-id="Ch_c345w0YB8k4AMcYiB-2"><g><rect x="0" y="0" width="40" height="40" fill="#ffffff" stroke="#000000" pointer-events="all" style="fill: light-dark(#ffffff, var(--ge-dark-color, #121212)); stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="M-Gqk-PIzZ6omj-RPAR_-4"><g/></g><g data-cell-id="M-Gqk-PIzZ6omj-RPAR_-6"><g><path d="M 10 10 L 30 30" fill="none" stroke="#000000" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g><g data-cell-id="Ch_c345w0YB8k4AMcYiB-1"><g><path d="M 30 10 L 10 30" fill="none" stroke="#000000" stroke-miterlimit="10" pointer-events="stroke" style="stroke: light-dark(rgb(0, 0, 0), rgb(255, 255, 255));"/></g></g></g></g></g></svg>
            </div>
        </div>
    </body>
</html>