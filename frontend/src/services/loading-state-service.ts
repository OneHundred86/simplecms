import { BehaviorSubject, Observable } from 'rxjs'

class LoadingStateService {
    loadingSubject = new BehaviorSubject(false)

    setLoading(loading: boolean) {
        this.loadingSubject.next(loading)
    }

    subscribe(): Observable<boolean> {
        return this.loadingSubject.asObservable()
    }
}

export default new LoadingStateService()