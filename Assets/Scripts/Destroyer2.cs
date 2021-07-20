using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Destroyer2 : MonoBehaviour
{
    public float lifetime;

    void Update()
    {
        Destroy(gameObject, lifetime);
    }
}
