using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class WebRequest : MonoBehaviour
{

    public static float DogeChange;
    public static float EthChange;
    public static float BtcChange;

    public  float DogeChangeNum;
    public  float EthChangeNum;
    public  float BtcChangeNum;

    void Update()
    {
        DogeChange = DogeChangeNum;
        EthChange = EthChangeNum;
        BtcChange = BtcChangeNum;
    }
}

