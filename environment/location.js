
var Tasks =
{
    recurring : '/ishfinal/API/recta.php',
    nonrecurring : '/ishfinal/API/daynoreta.php',
    calnonrecurring: '/ishfinal/API/nonrecta.php'


};

var Events =
{

    recurring : '/ishfinal/API/receve.php',
    nonrecurring : '/ishfinal/API/daynonrecev.php',
    calnonrecurring: '/ishfinal/API/nonrecev.php'

};

var FormSubmit =
{

agendapost : 'services/taskmgmt/postservice/updatetasks.php',
agendapostev : 'services/taskmgmt/postservice/updateevents.php',
agendasubmit  :  'http://localhost/Ishlawwebv2/index.php',
createtask : 'services/taskmgmt/postservice/createtasks.php',
createtasksubmit: 'kazi.php',
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
    fetchstaffoptions : 'https://ishlaw_auth.ambience.co.ke/api/auth/v1/team/getAll',
    fetchusers: 'https://ishlaw_auth.ambience.co.ke/api/auth/v1/users/getAll',

};

var Cases =
{
fetch : 'https://ifs.ambience.co.ke/files/api/v1/folders',
post : 'http://localhost/Ishlawwebv10/services/cases/postservice/postcases.php'
};


var Appointments =
    {
        fetch : 'services/appointments/appointmentsdata.php',
        approve : 'services/appointments/postservice/approvals.php'
    };


var Messages =
    {
        fetchsent : 'services/Messaging/SentMessagesListing.php',
        fetchinbox : 'services/Messaging/InboxMessagesListing.php',
        fetchcount : 'services/Messaging/displaycount.php',
        compose: 'services/Messaging/ComposeNewMsg.php'
    };



