import React, { useEffect } from 'react';
import { PortalMessageService } from '../../services';

export const Portal: React.FC<{ channel: string }> = ({ children, channel }) => {
    useEffect(() => {
        PortalMessageService.publish({
            type: channel,
            body: children,
        });
    }, [children, channel]);

    return null;
};

export const CHANNEL_APP_BAR_TITLE = 'appBarTitle';
