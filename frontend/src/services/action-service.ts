import { BehaviorSubject, filter, Observable } from 'rxjs';

class ActionService {
    private actionSubject = new BehaviorSubject<string>(null);

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