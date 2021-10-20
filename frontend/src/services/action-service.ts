import { filter, Observable, Subject } from 'rxjs';

class ActionService {
    private actionSubject = new Subject<string>();

    save = (): void => {
        this.actionSubject.next('save');
    };

    publish = (): void => {
        this.actionSubject.next('publish');
    };
    withdraw = (): void => {
        this.actionSubject.next('withdraw');
    };

    handleAction = (action: string): Observable<string> => {
        return this.actionSubject.pipe(filter(x => x === action));
    };
}

export default new ActionService();