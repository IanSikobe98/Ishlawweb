
var Tasks =
{
    recurring : 'services/taskmgmt/API/recta.php',
    nonrecurring : 'services/taskmgmt/API/daynoreta.php',
    calnonrecurring: 'services/taskmgmt/API/nonrecta.php',
    calrecurring : 'services/taskmgmt/API/dayrecta.php',


};

var Events =
{

    recurring : 'services/taskmgmt/API/receve.php',
    nonrecurring : 'services/taskmgmt/API/daynonrecev.php',
    calnonrecurring: 'services/taskmgmt/API/nonrecev.php',
    dayrecurring: 'services/taskmgmt/API/dayreceve.php',

};

var FormSubmit =
{

agendapost : 'services/taskmgmt/postservice/updatetasks.php',
agendapostev : 'services/taskmgmt/postservice/updateevents.php',
agendasubmit  :  'http://localhost/Ishlawwebv2/index.php',
createtask : 'services/taskmgmt/postservice/createtasks.php',
createtasksubmit: 'kazi.php',
createeventsubmit: 'tvents.php',
createevent : 'services/taskmgmt/postservice/createevents.php',
};


var Filing =
{
fetch : 'https://ifs.ambience.co.ke/files/api/v1/documents',
fetchdoc : 'https://ifs.ambience.co.ke/files/api/v1/documents/',
postfile : 'https://ifs.ambience.co.ke/files/api/v1/documents',
fetchspec :'http://localhost/ishlawwebv10/Conveyancing.php'
};

var Usermngmt ={

	createclient : 'services/usermgmt/postservice/createclient.php',
	createvisitors : 'services/usermgmt/postservice/createvisitors.php' ,
    fetchstaffoptions : 'http://localhost:8056/api/getRoles',
    fetchusers: 'http://localhost:8056/api/getMembers',
    authenticate:  'services/usermgmt/postservice/authenticate.php',
    resetpassword: 'services/usermgmt/postservice/resetpassword.php',
    fetchuser: 'http://localhost:8056/api/getMemberById',

};

var Cases =
{
fetch : 'https://ifs.ambience.co.ke/files/api/v1/folders',
post : 'http://localhost/Ishlawwebv10/services/cases/postservice/postcases.php'
};


var Appointments =
    {
        fetch : 'services/appointments/appointmentsdata.php',
        approve : 'services/appointments/postservice/approvals.php',
        submit : 'services/appointments/postservice/postappointments.php'
    };


var Messages =
    {
        fetchsent : 'services/Messaging/SentMessagesListing.php',
        fetchinbox : 'services/Messaging/InboxMessagesListing.php',
        fetchcount : 'services/Messaging/displaycount.php',
        compose: 'services/Messaging/ComposeNewMsg.php',
        updateStatus:'services/Messaging/UpdateMsgStatus.php'
    };



