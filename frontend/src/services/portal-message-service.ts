import { BehaviorSubject, filter, map, Observable } from 'rxjs';
import { ReactElement, ReactNode } from 'react';

class PortalMessageService {
    private _portalMessageSubject = new BehaviorSubject<{ type: string, body: ReactElement | ReactNode }>(null);

    publish(message: { type: string, body: ReactElement | ReactNode }): void {
        this._portalMessageSubject.next(message);
    }

    onMessage(type): Observable<ReactElement | ReactNode> {
        return this._portalMessageSubject.pipe(filter(x => x?.type === type), map(x => x.body));
    }
}

export default new PortalMessageService();