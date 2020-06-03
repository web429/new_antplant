<?php
	/**
	 * language pack
	 * @author Crista Cristian (ccioan [at] yahoo [dot] com)
	 * @link www.phpletter.com
	 * @since 17/02/2009
	 *
	 */
	define('DATE_TIME_FORMAT', 'd/M/Y H:i:s');
	//Common
	//Menu
	
	
	
	
	define('MENU_SELECT', 'Selecteaza');
	define('MENU_DOWNLOAD', 'Download');
	define('MENU_PREVIEW', 'Previzualizare');
	define('MENU_RENAME', 'Redenumire');
	define('MENU_EDIT', 'Modifica');
	define('MENU_CUT', 'Taie');
	define('MENU_COPY', 'Copiaza');
	define('MENU_DELETE', 'Sterge');
	define('MENU_PLAY', 'Play');
	define('MENU_PASTE', 'Lipire');
	
		//Label
		//Top Action
	define('LBL_ACTION_REFRESH', 'Actualizeaza');
	define('LBL_ACTION_DELETE', 'Sterge');
	define('LBL_ACTION_CUT', 'Taie');
	define('LBL_ACTION_COPY', 'Copiaza');
	define('LBL_ACTION_PASTE', 'Lipeste');
	define('LBL_ACTION_CLOSE', 'Inchide');
	define('LBL_ACTION_SELECT_ALL', 'Selecteaza tot');
		//File Listing
	define('LBL_NAME', 'Nume');
	define('LBL_SIZE', 'Dimensiune');
	define('LBL_MODIFIED', 'Modificat la');
		//File Information
	define('LBL_FILE_INFO', 'Informatie fisier:');
	define('LBL_FILE_NAME', 'Nume:');	
	define('LBL_FILE_CREATED', 'Creat:');
	define('LBL_FILE_MODIFIED', 'Modificat:');
	define('LBL_FILE_SIZE', 'Dimensiune fisier:');
	define('LBL_FILE_TYPE', 'Tip fisier:');
	define('LBL_FILE_WRITABLE', 'Scriere?');
	define('LBL_FILE_READABLE', 'Citire?');
		//Folder Information
	define('LBL_FOLDER_INFO', 'Informatie dosar');
	define('LBL_FOLDER_PATH', 'Dosar:');
	define('LBL_CURRENT_FOLDER_PATH', 'Cale dosar curent:');
	define('LBL_FOLDER_CREATED', 'Creat:');
	define('LBL_FOLDER_MODIFIED', 'Modificat:');
	define('LBL_FOLDER_SUDDIR', 'Subdosare:');
	define('LBL_FOLDER_FIELS', 'Fisiere:');
	define('LBL_FOLDER_WRITABLE', 'Scriere?');
	define('LBL_FOLDER_READABLE', 'Citire?');
	define('LBL_FOLDER_ROOT', 'Dosar radacina');
		//Preview
	define('LBL_PREVIEW', 'Previzualizare');
	define('LBL_CLICK_PREVIEW', 'Clic aici pt. previzualizare.');
	//Buttons
	define('LBL_BTN_SELECT', 'Selecteaza');
	define('LBL_BTN_CANCEL', 'Anuleaza');
	define('LBL_BTN_UPLOAD', 'Upload');
	define('LBL_BTN_CREATE', 'Creeaza');
	define('LBL_BTN_CLOSE', 'Inchide');
	define('LBL_BTN_NEW_FOLDER', 'Dosar nou');
	define('LBL_BTN_NEW_FILE', 'Fisier nou');
	define('LBL_BTN_EDIT_IMAGE', 'Editeaza');
	define('LBL_BTN_VIEW', 'Selecteaza vizualizare');
	define('LBL_BTN_VIEW_TEXT', 'Text');
	define('LBL_BTN_VIEW_DETAILS', 'Detalii');
	define('LBL_BTN_VIEW_THUMBNAIL', 'Miniatura');
	define('LBL_BTN_VIEW_OPTIONS', 'Mareste:');
	//pagination
	define('PAGINATION_NEXT', 'Urmatoarea');
	define('PAGINATION_PREVIOUS', 'Anterioara');
	define('PAGINATION_LAST', 'Ultima');
	define('PAGINATION_FIRST', 'Prima');
	define('PAGINATION_ITEMS_PER_PAGE', 'Afiseaza %s elemente pe pagina');
	define('PAGINATION_GO_PARENT', 'Dosar parinte');
	//System
	define('SYS_DISABLED', 'Permisiune interzisa: Sistem dezactivat.');
	
	//Cut
	define('ERR_NOT_DOC_SELECTED_FOR_CUT', 'Niciun document(e) selectat pt. taiere.');
	//Copy
	define('ERR_NOT_DOC_SELECTED_FOR_COPY', 'Niciun document(e) selectat pt. copiere.');
	//Paste
	define('ERR_NOT_DOC_SELECTED_FOR_PASTE', 'Niciun document(e) selectat pt. lipire.');
	define('WARNING_CUT_PASTE', 'Doriti mutarea documentelor selectate in dosarul curent?');
	define('WARNING_COPY_PASTE', 'Doriti copierea documentelor selectate in dosarul curent?');
	define('ERR_NOT_DEST_FOLDER_SPECIFIED', 'Dosar destinatie nespecificat.');
	define('ERR_DEST_FOLDER_NOT_FOUND', 'Dosar destinatie negasit.');
	define('ERR_DEST_FOLDER_NOT_ALLOWED', 'Nu este permis sa mutati fisiere in acest dosar');
	define('ERR_UNABLE_TO_MOVE_TO_SAME_DEST', 'Mutare fisier (%s) esuata: calea origniala este aceeasi cu calea destinatie.');
	define('ERR_UNABLE_TO_MOVE_NOT_FOUND', 'Mutare fisier (%s) esuata: fisierul original nu exista.');
	define('ERR_UNABLE_TO_MOVE_NOT_ALLOWED', 'Mutare fisier (%s) esuata: accesul interzis la fisierul original.');
 
	define('ERR_NOT_FILES_PASTED', 'Niciun fisier(e) nu a fost lipit.');

	//Search
	define('LBL_SEARCH', 'Cauta');
	define('LBL_SEARCH_NAME', 'Nume fisier complet/partial:');
	define('LBL_SEARCH_FOLDER', 'Priveste in:');
	define('LBL_SEARCH_QUICK', 'Cautare rapida');
	define('LBL_SEARCH_MTIME', 'Data(interval) modificare fisier:');
	define('LBL_SEARCH_SIZE', 'Dimensiune fisier:');
	define('LBL_SEARCH_ADV_OPTIONS', 'Optiuni avansate');
	define('LBL_SEARCH_FILE_TYPES', 'Tipuri de fisiere:');
	define('SEARCH_TYPE_EXE', 'Aplicatie');
	
	define('SEARCH_TYPE_IMG', 'Imagine');
	define('SEARCH_TYPE_ARCHIVE', 'Arhiva');
	define('SEARCH_TYPE_HTML', 'HTML');
	define('SEARCH_TYPE_VIDEO', 'Video');
	define('SEARCH_TYPE_MOVIE', 'Film');
	define('SEARCH_TYPE_MUSIC', 'Muzica');
	define('SEARCH_TYPE_FLASH', 'Flash');
	define('SEARCH_TYPE_PPT', 'PowerPoint');
	define('SEARCH_TYPE_DOC', 'Document');
	define('SEARCH_TYPE_WORD', 'Word');
	define('SEARCH_TYPE_PDF', 'PDF');
	define('SEARCH_TYPE_EXCEL', 'Excel');
	define('SEARCH_TYPE_TEXT', 'Text');
	define('SEARCH_TYPE_UNKNOWN', 'Necunoscut');
	define('SEARCH_TYPE_XML', 'XML');
	define('SEARCH_ALL_FILE_TYPES', 'Toate tipurile de fisiere');
	define('LBL_SEARCH_RECURSIVELY', 'Cautare Search recursiva:');
	define('LBL_RECURSIVELY_YES', 'Da');
	define('LBL_RECURSIVELY_NO', 'Nu');
	define('BTN_SEARCH', 'Cauta acum');
	//thickbox
	define('THICKBOX_NEXT', 'Urmatorul&gt;');
	define('THICKBOX_PREVIOUS', '&lt;anteriorul');
	define('THICKBOX_CLOSE', 'Inchide');
	//Calendar
	define('CALENDAR_CLOSE', 'Inchide');
	define('CALENDAR_CLEAR', 'Curata');
	define('CALENDAR_PREVIOUS', '&lt;Anteriorul');
	define('CALENDAR_NEXT', 'Urmatorul&gt;');
	define('CALENDAR_CURRENT', 'Astazi');
	define('CALENDAR_MON', 'Lun');
	define('CALENDAR_TUE', 'Mar');
	define('CALENDAR_WED', 'Mie');
	define('CALENDAR_THU', 'Joi');
	define('CALENDAR_FRI', 'Fin');
	define('CALENDAR_SAT', 'Sam');
	define('CALENDAR_SUN', 'Dum');
	define('CALENDAR_JAN', 'ian');
	define('CALENDAR_FEB', 'Feb');
	define('CALENDAR_MAR', 'Mar');
	define('CALENDAR_APR', 'Apr');
	define('CALENDAR_MAY', 'Mai');
	define('CALENDAR_JUN', 'Iun');
	define('CALENDAR_JUL', 'Iul');
	define('CALENDAR_AUG', 'Aug');
	define('CALENDAR_SEP', 'Sep');
	define('CALENDAR_OCT', 'Oct');
	define('CALENDAR_NOV', 'Noi');
	define('CALENDAR_DEC', 'Dec');
	//ERROR MESSAGES
		//deletion
	define('ERR_NOT_FILE_SELECTED', 'Selectati un fisier.');
	define('ERR_NOT_DOC_SELECTED', 'Niciun document selectat pentru stergere.');
	define('ERR_DELTED_FAILED', 'Imposibil de sters documentul(e) selectat.');
	define('ERR_FOLDER_PATH_NOT_ALLOWED', 'Cale dosar nepermisa.');
		//class manager
	define('ERR_FOLDER_NOT_FOUND', 'Imposibil de localizate dosarul specificat: ');
		//rename
	define('ERR_RENAME_FORMAT', 'Va rugam sa dati un nume care sa contina doar litere, cifre, spatiu, cratima si subliniere.');
	define('ERR_RENAME_EXISTS', 'Va rugam sa dati un nume care este unic in dosar.');
	define('ERR_RENAME_FILE_NOT_EXISTS', 'Fisierul/dosarul nu exista.');
	define('ERR_RENAME_FAILED', 'Imposibil de redenumit, va rugam sa incercati din nou.');
	define('ERR_RENAME_EMPTY', 'Va rugam sa dati un nume.');
	define('ERR_NO_CHANGES_MADE', 'Nici o modificare nu a fost facuta.');
	define('ERR_RENAME_FILE_TYPE_NOT_PERMITED', 'Nu aveti permisiunea de a modifica fisierul la o astfel de extensie.');
		//folder creation
	define('ERR_FOLDER_FORMAT', 'Va rugam sa dati un nume care sa contina doar litere, cifre, spatiu, cratima si subliniere.');
	define('ERR_FOLDER_EXISTS', 'Va rugam sa dati un nume care este unic in dosar.');
	define('ERR_FOLDER_CREATION_FAILED', 'Imposibil de creat dosar, va rugam sa incercati din nou.');
	define('ERR_FOLDER_NAME_EMPTY', 'Va rugam sa dati un nume.');
	define('FOLDER_FORM_TITLE', 'Formular doar nou');
	define('FOLDER_LBL_TITLE', 'Titlu dosar:');
	define('FOLDER_LBL_CREATE', 'Creeaza dosar');
	//New File
	define('NEW_FILE_FORM_TITLE', 'Formular fisier nou');
	define('NEW_FILE_LBL_TITLE', 'Nume fisier:');
	define('NEW_FILE_CREATE', 'Creeaza fisier');
		//file upload
	define('ERR_FILE_NAME_FORMAT', 'Va rugam sa dati un nume care sa contina doar litere, cifre, spatiu, cratima si subliniere.');
	define('ERR_FILE_NOT_UPLOADED', 'Niciun fisier selectat pentru incarcare.');
	define('ERR_FILE_TYPE_NOT_ALLOWED', 'Nu aveti permisiune sa faceti upload pentru fisiere de tipul acesta.');
	define('ERR_FILE_MOVE_FAILED', 'Eroare mutare fisier.');
	define('ERR_FILE_NOT_AVAILABLE', 'Fisierul nu este disponibil.');
	define('ERROR_FILE_TOO_BID', 'Fisier prea mare. (max.: %s)');
	define('FILE_FORM_TITLE', 'Formular incarcare fisier');
	define('FILE_LABEL_SELECT', 'Selecteaza fisier');
	define('FILE_LBL_MORE', 'Adauga fisier pentru incarcare');
	define('FILE_CANCEL_UPLOAD', 'Anuleaza incarcare fisier');
	define('FILE_LBL_UPLOAD', 'Incarcare');
	//file download
	define('ERR_DOWNLOAD_FILE_NOT_FOUND', 'Niciun fisier selectat pentru descarcare.');
	//Rename
	define('RENAME_FORM_TITLE', 'Formular redenumire');
	define('RENAME_NEW_NAME', 'Nume nou');
	define('RENAME_LBL_RENAME', 'Redenumeste');

	//Tips
	define('TIP_FOLDER_GO_DOWN', 'Un singur clic pentru a accesa dosarul...');
	define('TIP_DOC_RENAME', 'Dublu clic pentru modificare...');
	define('TIP_FOLDER_GO_UP', 'Un singur clic pentru a merge in dosarul parinte...');
	define('TIP_SELECT_ALL', 'Selecteaza tot');
	define('TIP_UNSELECT_ALL', 'Deselecteaza tot');
	//WARNING
	define('WARNING_DELETE', 'Sunteti sigur ca doriti stergerea documentului(lor).');
	define('WARNING_IMAGE_EDIT', 'Va rugam selectati o imagine pentru editare.');
	define('WARNING_NOT_FILE_EDIT', 'Va rugam selectati un fisier pentru editare.');
	define('WARING_WINDOW_CLOSE', 'Sunteti sigur ca doriti inchiderea ferestrei?');
	//Preview
	define('PREVIEW_NOT_PREVIEW', 'Nicio previzualizare disponibila.');
	define('PREVIEW_OPEN_FAILED', 'Imposibil de deschis fisier.');
	define('PREVIEW_IMAGE_LOAD_FAILED', 'Imposibil de incarcat imagine');

	//Login
	define('LOGIN_PAGE_TITLE', 'Formular de conectare Ajax File Manager');
	define('LOGIN_FORM_TITLE', 'Formular de conectare');
	define('LOGIN_USERNAME', 'Utilizator:');
	define('LOGIN_PASSWORD', 'Parola:');
	define('LOGIN_FAILED', 'Utilizator/Parola incorecte.');
	
	
	//88888888888   Below for Image Editor   888888888888888888888
		//Warning 
		define('IMG_WARNING_NO_CHANGE_BEFORE_SAVE', 'You have not made any changes to the images.');
		
		//General
		define('IMG_GEN_IMG_NOT_EXISTS', 'Imaginea nu exista');
		define('IMG_WARNING_LOST_CHANAGES', 'Toate modificarile nesalvate se vor pierde, doriti continuarea?');
		define('IMG_WARNING_REST', 'Toate modificarile nesalvate se vor pierde, doriti resetarea?');
		define('IMG_WARNING_EMPTY_RESET', 'Nicio modificare facuta imaginii');
		define('IMG_WARING_WIN_CLOSE', 'Doriti inchiderea ferestrei?');
		define('IMG_WARNING_UNDO', 'Doriti restaurarea imaginii la starea initiala?');
		define('IMG_WARING_FLIP_H', 'Doriti intoarcerea imaginii pe orizontala?');
		define('IMG_WARING_FLIP_V', 'Doriti intoarcerea imaginii pe verticala');
		define('IMG_INFO', 'Informatii imagine');
		
		//Mode
			define('IMG_MODE_RESIZE', 'Redimensionare:');
			define('IMG_MODE_CROP', 'Taie:');
			define('IMG_MODE_ROTATE', 'Roteste:');
			define('IMG_MODE_FLIP', 'Intoarcere:');		
		//Button
		
			define('IMG_BTN_ROTATE_LEFT', '90&deg;CAC');
			define('IMG_BTN_ROTATE_RIGHT', '90&deg;AC');
			define('IMG_BTN_FLIP_H', 'Intoarce orizontal');
			define('IMG_BTN_FLIP_V', 'Intoarce vertical');
			define('IMG_BTN_RESET', 'Reseteaza');
			define('IMG_BTN_UNDO', 'Undo');
			define('IMG_BTN_SAVE', 'Salveaza');
			define('IMG_BTN_CLOSE', 'Inchide');
			define('IMG_BTN_SAVE_AS', 'Salveaza ca');
			define('IMG_BTN_CANCEL', 'Anuleaza');
		//Checkbox
			define('IMG_CHECKBOX_CONSTRAINT', 'Constrangere?');
		//Label
			define('IMG_LBL_WIDTH', 'Latime:');
			define('IMG_LBL_HEIGHT', 'Inaltime:');
			define('IMG_LBL_X', 'X:');
			define('IMG_LBL_Y', 'Y:');
			define('IMG_LBL_RATIO', 'Raport:');
			define('IMG_LBL_ANGLE', 'Unghi:');
			define('IMG_LBL_NEW_NAME', 'Nume nou:');
			define('IMG_LBL_SAVE_AS', 'Formular Salveaza ca');
			define('IMG_LBL_SAVE_TO', 'Salveaza la:');
			define('IMG_LBL_ROOT_FOLDER', 'Dosar radacina');
		//Editor
		//Save as 
		define('IMG_NEW_NAME_COMMENTS', 'Nu includeti extensia imaginii.');
		define('IMG_SAVE_AS_ERR_NAME_INVALID', 'Va rugam sa dati un nume care sa contina doar litere, cifre, spatiu, cratima si subliniere.');
		define('IMG_SAVE_AS_NOT_FOLDER_SELECTED', 'Dosar destinatie neselectat.');	
		define('IMG_SAVE_AS_FOLDER_NOT_FOUND', 'Dosar destinatie inexistent.');
		define('IMG_SAVE_AS_NEW_IMAGE_EXISTS', 'Imagine existenta cu acelasi nume.');

		//Save
		define('IMG_SAVE_EMPTY_PATH', 'Cale imagine goala.');
		define('IMG_SAVE_NOT_EXISTS', 'imagine inexistenta.');
		define('IMG_SAVE_PATH_DISALLOWED', 'Nu aveti dreptul de a acesa imaginea.');
		define('IMG_SAVE_UNKNOWN_MODE', 'Unexpected Image Operation Mode');
		define('IMG_SAVE_RESIZE_FAILED', 'Redimensionare imagine nereusita.');
		define('IMG_SAVE_CROP_FAILED', 'taiare imagine nereusita.');
		define('IMG_SAVE_FAILED', 'Salvare imagine nereusita.');
		define('IMG_SAVE_BACKUP_FAILED', 'Imposibil de a face o copie de siguranta a imaginii originale.');
		define('IMG_SAVE_ROTATE_FAILED', 'Imposibil de rotit imaginea.');
		define('IMG_SAVE_FLIP_FAILED', 'Imposibil de intors imaginea.');
		define('IMG_SAVE_SESSION_IMG_OPEN_FAILED', 'Imposibil de deschis imaginea.');
		define('IMG_SAVE_IMG_OPEN_FAILED', 'imposibil de deschis imaginea.');
		
		
		//UNDO
		define('IMG_UNDO_NO_HISTORY_AVAIALBE', 'Istoric inexistent pentru refacere actiune.');
		define('IMG_UNDO_COPY_FAILED', 'Imposibil de refacut imaginea.');
		define('IMG_UNDO_DEL_FAILED', 'Imposibil de a sterge imaginea');
	
	//88888888888   Above for Image Editor   888888888888888888888
	
	//88888888888   Session   888888888888888888888
		define('SESSION_PERSONAL_DIR_NOT_FOUND', 'Imposibil de a gasi dosarul dedicat ce ar fi trebuie sa existe in dosarul sesiunnii');
		define('SESSION_COUNTER_FILE_CREATE_FAILED', 'Imposibil de deschis sesiunea contra fisier.');
		define('SESSION_COUNTER_FILE_WRITE_FAILED', 'Imposibil de scris sesiunea contra fisier.');
	//88888888888   Session   888888888888888888888
	
	//88888888888   Below for Text Editor   888888888888888888888
		define('TXT_FILE_NOT_FOUND', 'Fisier negasit.');
		define('TXT_EXT_NOT_SELECTED', 'Selctati o extensie');
		define('TXT_DEST_FOLDER_NOT_SELECTED', 'Selactati un dosar destinatie');
		define('TXT_UNKNOWN_REQUEST', 'Solicitare necunoscuta.');
		define('TXT_DISALLOWED_EXT', 'Aveti permisiunea de a modifica/adauga acest tip de fisier.');
		define('TXT_FILE_EXIST', 'Acest fisier exista deja.');
		define('TXT_FILE_NOT_EXIST', 'Acest fisier nu exista.');
		define('TXT_CREATE_FAILED', 'Imposibil de creat un nou fisier.');
		define('TXT_CONTENT_WRITE_FAILED', 'imposibil de a scrie continutul in fisier.');
		define('TXT_FILE_OPEN_FAILED', 'Imposibil de a deschid efisierul.');
		define('TXT_CONTENT_UPDATE_FAILED', 'Imposibil de a actualiza continutul fisierului.');
		define('TXT_SAVE_AS_ERR_NAME_INVALID', 'Va rugam sa dati un nume care sa contina doar litere, cifre, spatiu, cratima si subliniere.');
	//88888888888   Above for Text Editor   888888888888888888888		
?>