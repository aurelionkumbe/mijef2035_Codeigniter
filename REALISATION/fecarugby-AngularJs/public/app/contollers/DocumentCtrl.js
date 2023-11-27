app.controller('DocumentCtrl', function ($scope, $timeout, $http) {

    
    var documents = [
        /** un document*/
        {'id':'information','name':'Bulletins Information', 'pdfs':[
            
            {'name':'Attestation de la world rugby', 'source':'attestation de lemissaire de la world rugby Age du 28  decembre 2013.pdf'},
            {'name':'Homologation', 'source':'homologation elections par Minsep et certificat  dindividualite.pdf'},
            {'name':'Bulletin d\'informations', 'source':''},
            {'name':'Document ', 'source':''}  
        ]},
        /** un autre document*/
        {'id':'administratif','name':'Documents administratifs', 'pdfs':[
            /** aucun pdf */
        ]},
        /** un autre document*/
        {'id':'technique','name':'Documents techniques', 'pdfs':[
            /** aucun pdf */
        ]}
    ];
    
    $scope.documents = documents;
    
    $scope.documentLink="documents/attestation de lemissaire de la world rugby Age du 28  decembre 2013.pdf";
    $scope.pdfReader=function (documentLink){
        console.log(documentLink);
        $scope.documentLink='documents/'+documentLink;
       
    };

});